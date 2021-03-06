<?php

namespace frontend\controllers;

use common\models\Album;
use common\models\Artista;
use common\models\Comment;
use common\models\Compra;
use common\models\Fav_Album;
use common\models\Fav_Artista;
use common\models\Fav_Musica;
use common\models\Musica;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class DetalhesController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'album', 'artista', 'special-callback'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['album', 'artista'],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','album', 'artista'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['special-callback'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action){}
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],

        ];
    }
    public function actionSpecialCallback()
    {
        $message= 'Entre na sua conta para poder realizar esta ação!';
        return $this->render('login',['message'=>$message]);
    }



    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionAlbum($id)
    {
        $album = Album::find()
            ->where(['id' => $id])
            ->one();

        $musicasAlbum = Musica::find()
            ->where(['id_album' => $id])
            ->all();

        $commentAlbum = Comment::find()
            ->where(['id_album' => $id])
            ->all();

        $userLogado = Yii::$app->user->identity;

        $estadoFav = Fav_Album::find()
            ->where(['and',['id_utilizador'=>$userLogado->getId(),'id_album'=> $id]])
            ->distinct()
            ->all();

        $modelComment = new Comment();

        $musicasFav = Fav_Musica::find()->where(['id_utilizador' => $userLogado->getId()])->all();

        $musicasFavModels = array();

        foreach ($musicasFav as $fav_musica){
            $musica = Musica::findOne($fav_musica->id_musica);
            array_push($musicasFavModels,$musica);
        }

        $itemsCarrinho = $this->getItemsCarrinho($userLogado);

        return $this->render('detalhes_album', [
            'id' => $id,
            'album' => $album,
            'musicasAlbum' => $musicasAlbum,
            'commentAlbum' => $commentAlbum,
            'estadoFav' => $estadoFav,
            'modelComment' => $modelComment,
            'musicasFav'=> ArrayHelper::getColumn($musicasFavModels,'id'),
            'itemsCarrinho' => $itemsCarrinho
        ]);
    }

    public function actionArtista($id)
    {
        $artista = Artista::findOne($id);

        $albunsArtista = Album::find()
            ->where(['id_artista' => $id])
            ->all();

        $userLogado = Yii::$app->user->identity;

        $estadoFav = Fav_Artista::find()
            ->where(['and',['id_utilizador'=>$userLogado->getId(),'id_artista'=> $id]])
            ->distinct()
            ->all();

        return $this->render('detalhes_artista', [
            'id' => $id,
            'artista' => $artista,
            'albunsArtista' => $albunsArtista,
            'estadoFav' => $estadoFav,
        ]);
    }

    public function getItemsCarrinho($userLogado){

        $carrinho = Compra::find()
            ->where(['and',['id_utilizador'=> $userLogado,'efetivada'=>0]])
            ->with('linhaCompras')
            ->one();

        $musicas = array();

        foreach ($carrinho->relatedRecords as $lcArray){

            if(count($lcArray) > 0){
                foreach ($lcArray as $lc){
                    array_push($musicas, Musica::findOne($lc->id_musica));
                }
            }
        }

        return ArrayHelper::getColumn($musicas,'id');
    }

}
