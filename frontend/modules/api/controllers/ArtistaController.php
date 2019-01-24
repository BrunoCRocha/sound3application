<?php

namespace frontend\modules\api\controllers;

use common\models\Album;
use common\models\Artista;
use common\models\Fav_Artista;
use yii\filters\auth\HttpBasicAuth;

class ArtistaController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Artista';

    public function actionDetalhes($id, $userLogado){
        $artista = Artista::find()
            ->where(['id' => $id])
            ->one();
        return $artista;
    }
  
    public function actionAlbunsartista($id)
    {
        $artista = Artista::findOne($id);

        return $artista->albums;
    }

    public function actionFindartistabyid($id){
        $artista = Artista::findOne($id);

        return ['artista' => $artista];
    }

    public function actionFindartistabysearch($search){
        $artistaSearch = Artista::find()
            ->where(['like', 'nome', $search])
            ->all();

        return $artistaSearch;
    }

    public function actionArtistasrandom(){
        $artistas = Artista::find()->all();

        $artistasRand = array_rand($artistas, 5);

        $artistasObjeto = Artista::find()
            ->where(['id' => $artistasRand])
            ->all();

        return $artistasObjeto;
    }
}
