<?php

namespace frontend\controllers;

use common\models\Album;
use common\models\Artista;
use common\models\Genero;
use common\models\Musica;
use yii\db\conditions\LikeCondition;

class PesquisaController extends \yii\web\Controller
{

    public function actionIndex($search)
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

        $tipo = 'artista';

        return $this->render('index',[
            'search' => $search,
            'artistaSearch' => $artistaSearch,
            'tipo' => $tipo
        ]);
    }

}
