<?php

namespace frontend\controllers;

use common\models\Album;
use common\models\Artista;
use common\models\Compra;
use common\models\Fav_Album;
use common\models\Fav_Artista;
use common\models\Fav_Genero;
use common\models\Fav_Musica;
use common\models\Genero;
use common\models\Musica;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class FavoritosController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','add-fav-artista','rem-fav-artista','add-fav-album','rem-fav-album','add-fav-genero','rem-fav-genero',
                    'add-fav-musica','rem-fav-musica'],
                'rules' => [
                    [
                        'actions' => ['index','add-fav-artista','rem-fav-artista','add-fav-album','rem-fav-album','add-fav-genero','rem-fav-genero',
                            'add-fav-musica','rem-fav-musica'],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['index','add-fav-artista','rem-fav-artista','add-fav-album','rem-fav-album','add-fav-genero','rem-fav-genero',
                            'add-fav-musica','rem-fav-musica'],
                        'allow' => true,
                        'roles' => ['@'],
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
    public function actionIndex()
    {
        $userLogado = Yii::$app->user->identity;

        $fav_Generos = Fav_Genero::find()
            ->where(['id_utilizador' => $userLogado->getId()])
            ->all();

        $fav_Artistas = Fav_Artista::find()
            ->where(['id_utilizador' => $userLogado->getId()])
            ->all();

        $fav_Albuns = Fav_Album::find()
            ->where(['id_utilizador' => $userLogado->getId()])
            ->all();

        $fav_Musicas = Fav_Musica::find()
            ->where(['id_utilizador' => $userLogado->getId()])
            ->all();

        if ($fav_Generos && $fav_Artistas && $fav_Albuns && $fav_Musicas != null){
            $favGeneros = array();
            $favArtistas = array();
            $favAlbuns = array();
            $favMusicas = array();

            foreach ($fav_Generos as $favgen){
                $fav = Genero::findOne($favgen->id_genero);
                array_push($favGeneros,$fav);
            }

            foreach ($fav_Albuns as $favalb){
                $fav = Album::findOne($favalb->id_album);
                array_push($favAlbuns,$fav);
            }

            foreach ($fav_Artistas as $favart){
                $fav = Artista::findOne($favart->id_artista);
                array_push($favArtistas,$fav);
            }

            foreach ($fav_Musicas as $favmus){
                $fav = Musica::findOne($favmus->id_musica);
                array_push($favMusicas,$fav);
            }

            $itemsCarrinho = $this->getItemsCarrinho($userLogado);

            return $this->render('index',[
                'favGeneros' => $favGeneros,
                'favArtistas' => $favArtistas,
                'favAlbuns' => $favAlbuns,
                'favMusicas' => $favMusicas,
                'itemsCarrinho'=> $itemsCarrinho
            ]);
        }else{
            return $this->redirect(['site/index']);
        }

    }

    public function actionAddFavArtista($id){

        $userLogado = Yii::$app->user->identity;

        $addFavorito = new Fav_Artista();

        $addFavorito->id_utilizador = $userLogado->id;
        $addFavorito->id_artista = $id;
        $addFavorito->save();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionRemFavArtista($id){

        $userLogado = Yii::$app->user->identity;

        $remFavorito = Fav_Artista::find()
            ->where(['and',['id_utilizador' => $userLogado->getId(), 'id_artista' => $id]])
            ->distinct()
            ->all();

        $remFavorito[0]->delete();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionAddFavAlbum($id){

        $userLogado = Yii::$app->user->identity;

        $addFavorito = new Fav_Album();

        $addFavorito->id_utilizador = $userLogado->id;
        $addFavorito->id_album = $id;
        $addFavorito->save();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionRemFavAlbum($id){

        $userLogado = Yii::$app->user->identity;

        $remFavorito = Fav_Album::find()
            ->where(['and',['id_utilizador' => $userLogado->getId(), 'id_album' => $id]])
            ->distinct()
            ->all();

        $remFavorito[0]->delete();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionAddFavMusica($id){

        $userLogado = Yii::$app->user->identity;

        $addFavorito = new Fav_Musica();

        $addFavorito->id_utilizador = $userLogado->id;
        $addFavorito->id_musica = $id;
        $addFavorito->save();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionRemFavMusica($id){

        $userLogado = Yii::$app->user->identity;

        $remFavorito = Fav_Musica::find()
            ->where(['and',['id_utilizador' => $userLogado->getId(), 'id_musica' => $id]])
            ->distinct()
            ->all();

        $remFavorito[0]->delete();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionAddFavGenero($id){

        $userLogado = Yii::$app->user->identity;

        $addFavorito = new Fav_Genero();

        $addFavorito->id_utilizador = $userLogado->id;
        $addFavorito->id_genero= $id;
        $addFavorito->save();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionRemFavGenero($id){

        $userLogado = Yii::$app->user->identity;

        $remFavorito = Fav_Genero::find()
            ->where(['and',['id_utilizador' => $userLogado->getId(), 'id_genero' => $id]])
            ->distinct()
            ->all();

        $remFavorito[0]->delete();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function getItemsCarrinho($userLogado){

        $carrinho = Compra::find()
            ->where(['and',['id_utilizador'=> $userLogado,'efetivada'=>0]])
            ->with('linhaCompras')
            ->distinct()
            ->all();

        $musicas = array();

        foreach ($carrinho[0]->relatedRecords as $lcArray){

            if(count($lcArray) > 0){
                foreach ($lcArray as $lc){
                    array_push($musicas, Musica::findOne($lc->id_musica));
                }
            }
        }

        return ArrayHelper::getColumn($musicas,'id');
    }

}
