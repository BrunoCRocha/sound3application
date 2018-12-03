<?php

namespace backend\controllers;

use backend\models\DadosDD;
use common\models\Album;
use common\models\Artista;
use common\models\Genero;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;


class TesteController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'subcat' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex(){
        $dadosSemValorMusica = new \common\models\DadosDd();
        $generos = Genero::find()->all();
        $generos2 = ArrayHelper::map($generos,'id','nome');

        return $this->render('testedrop.php', [
            'dadosSemValorMusica' => $dadosSemValorMusica,
            'generos2' => $generos2
            ]);
    }

    public function actionSubcat() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];

            if ($parents != null) {
                $cat_id = $parents[0];


                    $out = Album::find()
                        ->select(['id', 'nome'])
                        ->where(['id_artista' => $cat_id])
                        ->asArray()
                        ->all();
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                //
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }
}