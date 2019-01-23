<?php

namespace backend\controllers;

use common\models\Album;
use common\models\Musica;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;


class DepDemoController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' =>
                ['class' => \yii\filters\AccessControl::className(),
                    'only' => ['subcat','prod'],
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['subcat'],
                            'roles' => ['admin', 'Moderador'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['prod'],
                            'roles' => ['admin', 'Moderador'],
                        ],
                    ],
                ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSubcat() {
        $v = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];

            if ($parents != null) {
                $cat_id = $parents[0];
                $albuns = Album::find()
                    ->select(['id', 'nome'])
                    ->where(['id_artista' => $cat_id])
                    ->all();

                $v = array();

                foreach ($albuns as $album){
                    array_push($v,['id' => $album->id, 'name' => $album->nome]);
                }


                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                //
                echo Json::encode(['output'=>$v, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);




    }

    public function actionProd() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $cat_id = empty($ids[0]) ? null : $ids[0];
            $subcat_id = empty($ids[1]) ? null : $ids[1];
            if ($cat_id != null && $subcat_id != null) {

                $musicas = Musica::find()
                    ->select(['id', 'nome'])
                    ->where(['id_album' => $subcat_id])
                    ->all();

                $out = array();

                foreach ($musicas as $musica){
                    array_push($out,['id' => $musica->id, 'name' => $musica->nome]);
                }

                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

}
