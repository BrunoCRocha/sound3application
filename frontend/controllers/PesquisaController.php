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
        $queryAlbum = Musica::find()
            ->where(['like', 'nome', $search])
            ->all();

        return $this->render('index',[
            'search' => $search,
            'queryAlbum' => $queryAlbum
        ]);
    }

    public function actionAlbuns($search){

        $queryAlbum = Album::find()
            ->where(['like', 'nome', $search])
            ->all();

        return $this->render('index',[
            'search' => $search,
            'queryAlbum' => $queryAlbum
        ]);
    }

    public function actionGenero($search){

        $queryAlbum = Genero::find()
            ->where(['like', 'nome', $search])
            ->all();

        return $this->render('index',[
            'search' => $search,
            'queryAlbum' => $queryAlbum
        ]);
    }

    public function actionArtista($search){

        $queryAlbum = Artista::find()
            ->where(['like', 'nome', $search])
            ->all();

        return $this->render('index',[
            'search' => $search,
            'queryAlbum' => $queryAlbum
        ]);
    }

}
