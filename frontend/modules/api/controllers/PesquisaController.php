<?php
/**
 * Created by PhpStorm.
 * User: Diogo Cruz
 * Date: 20/01/2019
 * Time: 17:38
 */

namespace frontend\modules\api\controllers;


use common\models\Album;
use common\models\Artista;
use common\models\Compra;
use common\models\Fav_Album;
use common\models\Fav_Artista;
use common\models\Fav_Musica;
use common\models\Genero;
use common\models\Musica;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;

class PesquisaController extends Controller
{
    public function beforeAction($action)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }

    public function actionPesquisaalbuns($pesquisa){
        $albumSearch = Album::find()
            ->where(['like', 'nome', $pesquisa])
            ->all();

        //$favAlbPesquisados=$this->getFavAlbPesquisados($albumSearch);
        return $albumSearch;
    }

    public function actionPesquisageneros($pesquisa){
        $generoSearch = Genero::find()
            ->where(['like', 'nome', $pesquisa])
            ->all();

        //$favGenPesquisados=$this->getFavGenPesquisados($generoSearch);
        return $generoSearch;
    }

    public function actionPesquisaartistas($pesquisa){
        $artistaSearch = Artista::find()
            ->where(['like', 'nome', $pesquisa])
            ->all();

        //$favArtPesquisados=$this->getFavArtPesquisados($artistaSearch);


        return $artistaSearch;
    }

    public function actionPesquisamusicas($pesquisa){
        $musicaSearch = Musica::find()
            ->where(['like', 'nome', $pesquisa])
            ->all();

        /*$favMusPesquisadas=$this->getFavMusPesquisados($musicaSearch);


        $userLogado = Yii::$app->user->identity;
        $itemsCarrinho = $this->getItemsCarrinho($userLogado);*/
        return $musicaSearch;
    }



    /*public function actionIndex($search)
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



        $userLogado = Yii::$app->user->identity;

        $itemsCarrinho = $this->getItemsCarrinho($userLogado);


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
    }*/

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