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
use yii\db\conditions\LikeCondition;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class PesquisaController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','musica','albuns','genero', 'artista', 'index'],
                'rules' => [
                    [
                        'actions' => ['musica','albuns','genero','artista','index'],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','musica','albuns','genero','artista','index'],
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

    public function actionIndex($search)
    {
        $tipo = 'everything';

        $generoSearch = Genero::find()
            ->where(['like', 'nome', $search])
            ->all();

        $artistaSearch = Artista::find()
            ->where(['like', 'nome', $search])
            ->all();

        $albumSearch = Album::find()
            ->where(['like', 'nome', $search])
            ->all();

        $musicaSearch = Musica::find()
            ->where(['like', 'nome', $search])
            ->all();

        $favGenPesquisados=$this->getFavGenPesquisados($generoSearch);
        $favArtPesquisados=$this->getFavArtPesquisados($artistaSearch);
        $favAlbPesquisados=$this->getFavAlbPesquisados($albumSearch);
        $favMusPesquisadas=$this->getFavMusPesquisados($musicaSearch);

        /*CARRINHO*/

        $userLogado = Yii::$app->user->identity;

        $itemsCarrinho = $this->getItemsCarrinho($userLogado);

        //var_dump($favArtPesquisados);
        //die();

        return $this->render('index',[
            'search' => $search,
            'generoSearch' => $generoSearch,
            'artistaSearch' => $artistaSearch,
            'albumSearch' => $albumSearch,
            'musicaSearch' => $musicaSearch,
            'favArtPesquisados' => $favArtPesquisados,
            'favGenPesquisados' => $favGenPesquisados,
            'favAlbPesquisados' => $favAlbPesquisados,
            'favMusPesquisadas' => $favMusPesquisadas,
            'itemsCarrinho' => $itemsCarrinho,
            'tipo' => $tipo
        ]);
    }

    public function actionMusica($search)
    {
        $musicaSearch = Musica::find()
            ->where(['like', 'nome', $search])
            ->all();

        $favMusPesquisadas=$this->getFavMusPesquisados($musicaSearch);


        $userLogado = Yii::$app->user->identity;
        $itemsCarrinho = $this->getItemsCarrinho($userLogado);

        $tipo = 'musica';
        return $this->render('index',[
            'search' => $search,
            'musicaSearch' => $musicaSearch,
            'favMusPesquisadas' => $favMusPesquisadas,
            'itemsCarrinho' => $itemsCarrinho,
            'tipo' => $tipo
        ]);
    }

    public function actionAlbuns($search){

        $albumSearch = Album::find()
            ->where(['like', 'nome', $search])
            ->all();

        $favAlbPesquisados=$this->getFavAlbPesquisados($albumSearch);

        $tipo = 'album';
        return $this->render('index',[
            'search' => $search,
            'albumSearch' => $albumSearch,
            'favAlbPesquisados' => $favAlbPesquisados,
            'tipo' => $tipo
        ]);
    }

    public function actionGenero($search){

        $generoSearch = Genero::find()
            ->where(['like', 'nome', $search])
            ->all();

        $favGenPesquisados=$this->getFavGenPesquisados($generoSearch);

        $tipo = 'genero';
        return $this->render('index',[
            'search' => $search,
            'generoSearch' => $generoSearch,
            'favGenPesquisados' => $favGenPesquisados,
            'tipo' => $tipo
        ]);
    }

    public function actionArtista($search){

        $artistaSearch = Artista::find()
            ->where(['like', 'nome', $search])
            ->all();

        $favArtPesquisados=$this->getFavArtPesquisados($artistaSearch);

        /*var_dump($favoritosPesquisados);
        die();*/

        $tipo = 'artista';

        return $this->render('index',[
            'search' => $search,
            'artistaSearch' => $artistaSearch,
            'favArtPesquisados' => $favArtPesquisados,
            'tipo' => $tipo
        ]);
    }

    public function getFavGenPesquisados($generoSearch){
        //get id's dos resultados de pesquisa
        $idsGeneroSearch = ArrayHelper::getColumn($generoSearch,'id');

        //get o user logado
        $userLogado = Yii::$app->user->identity;

        //get fav_generos do user logado
        $favoritos = Fav_Genero::find()
            ->where(['id_utilizador' => $userLogado->getId()])
            ->all();

        //get modelos dos generos dentro dos fav_generos do user logado
        $generosFavoritos = array();

        foreach($favoritos as $favorito){
            array_push($generosFavoritos, Genero::findOne($favorito->id_genero));
        }

        //get ids dos modelos de generos favoritos
        $idsGeneroFavoritos = ArrayHelper::getColumn($generosFavoritos,'id');

        //comparação os ids dos modelos de generos resultantes da pesquisa e os favoritos do user
        $comum = array_intersect($idsGeneroFavoritos,$idsGeneroSearch);

        return $comum;
    }

    public function getFavArtPesquisados($artistaSearch){

        //get id's dos resultados de pesquisa
        $idsArtistaSearch = ArrayHelper::getColumn($artistaSearch,'id');

        //get o user logado
        $userLogado = Yii::$app->user->identity;

        //get fav_artistas do user logado
        $favoritos = Fav_Artista::find()
            ->where(['id_utilizador' => $userLogado->getId()])
            ->all();

        //get modelos dos artistas dentro dos fav_artistas do user logado
        $artistasFavoritos = array();

        foreach($favoritos as $favorito){
            array_push($artistasFavoritos, Artista::findOne($favorito->id_artista));
        }


        //get ids dos modelos de artistas favoritos
        $idsArtistaFavoritos = ArrayHelper::getColumn($artistasFavoritos,'id');

        //comparação os ids dos modelos de artistas resultantes da pesquisa e os favoritos do user
        $comum = array_intersect($idsArtistaFavoritos,$idsArtistaSearch);

        return $comum;
    }

    public function getFavAlbPesquisados($albumSearch){
        //get id's dos resultados de pesquisa
        $idsAlbumSearch = ArrayHelper::getColumn($albumSearch,'id');

        //get o user logado
        $userLogado = Yii::$app->user->identity;

        //get fav_generos do user logado
        $favoritos = Fav_Album::find()
            ->where(['id_utilizador' => $userLogado->getId()])
            ->all();

        //get modelos dos generos dentro dos fav_generos do user logado
        $albunsFavoritos = array();

        foreach($favoritos as $favorito){
            array_push($albunsFavoritos, Album::findOne($favorito->id_album));
        }

        //get ids dos modelos de generos favoritos
        $idsAlbumFavoritos = ArrayHelper::getColumn($albunsFavoritos,'id');

        //comparação os ids dos modelos de generos resultantes da pesquisa e os favoritos do user
        $comum = array_intersect($idsAlbumFavoritos,$idsAlbumSearch);

        return $comum;
    }

    public function getFavMusPesquisados($musicaSearch){
        //get id's dos resultados de pesquisa
        $idsMusicaSearch = ArrayHelper::getColumn($musicaSearch,'id');

        //get o user logado
        $userLogado = Yii::$app->user->identity;

        //get fav_generos do user logado
        $favoritos = Fav_Musica::find()
            ->where(['id_utilizador' => $userLogado->getId()])
            ->all();

        //get modelos dos generos dentro dos fav_generos do user logado
        $musicasFavoritas = array();

        foreach($favoritos as $favorito){
            array_push($musicasFavoritas, Musica::findOne($favorito->id_musica));
        }

        //get ids dos modelos de generos favoritos
        $idsMusicasFavoritas = ArrayHelper::getColumn($musicasFavoritas,'id');

        //comparação os ids dos modelos de generos resultantes da pesquisa e os favoritos do user
        $comum = array_intersect($idsMusicasFavoritas,$idsMusicaSearch);

        return $comum;
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
