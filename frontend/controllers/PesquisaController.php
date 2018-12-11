<?php

namespace frontend\controllers;

use common\models\Album;
use common\models\Artista;
use common\models\Fav_Artista;
use common\models\Genero;
use common\models\Musica;
use Yii;
use yii\db\conditions\LikeCondition;
use yii\helpers\ArrayHelper;

class PesquisaController extends \yii\web\Controller
{

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


        return $this->render('index',[
            'search' => $search,
            'generoSearch' => $generoSearch,
            'artistaSearch' => $artistaSearch,
            'albumSearch' => $albumSearch,
            'musicaSearch' => $musicaSearch,
            'tipo' => $tipo
        ]);
    }

    public function actionMusica($search)
    {
        $musicaSearch = Musica::find()
            ->where(['like', 'nome', $search])
            ->all();

        $tipo = 'musica';
        return $this->render('index',[
            'search' => $search,
            'musicaSearch' => $musicaSearch,
            'tipo' => $tipo
        ]);
    }

    public function actionAlbuns($search){

        $albumSearch = Album::find()
            ->where(['like', 'nome', $search])
            ->all();

        /*foreach ($albumSearch as $album){
            $numeroMusicas = Musica::find()
                ->where(['id_album' => $album->id])
                ->all();

            $valores[$album->id] = sizeof($numeroMusicas);
        }

        array_push($albumSearch, $valores);



        var_dump($albumSearch);
        die();*/

        $tipo = 'album';
        return $this->render('index',[
            'search' => $search,
            'albumSearch' => $albumSearch,
            'tipo' => $tipo
        ]);
    }

    public function actionGenero($search){

        $generoSearch = Genero::find()
            ->where(['like', 'nome', $search])
            ->all();

        $tipo = 'genero';
        return $this->render('index',[
            'search' => $search,
            'generoSearch' => $generoSearch,
            'tipo' => $tipo
        ]);
    }

    public function actionArtista($search){

        $artistaSearch = Artista::find()
            ->where(['like', 'nome', $search])
            ->all();

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

        $favoritosPesquisados = array();

        foreach ($comum as $id){
            array_push($favoritosPesquisados,Artista::findOne($id));
        }

        /*var_dump($favoritosPesquisados);
        die();*/

        $tipo = 'artista';

        return $this->render('index',[
            'search' => $search,
            'artistaSearch' => $artistaSearch,
            'favoritosPesquisados' => $favoritosPesquisados,
            'tipo' => $tipo
        ]);
    }

}
