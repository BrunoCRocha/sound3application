<?php

namespace frontend\modules\api\controllers;
use common\models\Album;
use common\models\Artista;
use common\models\Genero;
use yii\filters\auth\HttpBasicAuth;

class GeneroController extends \yii\rest\ActiveController{


    public $modelClass = 'common\models\Genero';


    public function actionTotalalbuns($id){

        $albuns = Album::find()->where(['id_genero' =>$id])->all();

        return ['totalalbuns' => count($albuns)];
    }

    public function actionFindgenerobyid($generoId){
        $genero = Genero::findOne($generoId);

        return ['genero' => $genero];

    }

    public function actionFindalbunsgenero($generoId){
        $albuns = Album::find()
            ->where(['id_genero' => $generoId])
            ->all();

        $artistas = array();

        foreach ($albuns as $album){
            array_push($artistas, Artista::find()
                ->where(['id' => $album->id_artista])
                ->one());
        }

        return ['albuns' => $albuns, 'artistas' => $artistas];
    }

    public function actionFindgenerobysearch($search){
        $generoSearch = Genero::find()
            ->where(['like', 'nome', $search])
            ->all();

        return $generoSearch;
    }

}


