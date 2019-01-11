<?php

namespace frontend\modules\api\controllers;

use common\models\Compra;
use common\models\LinhaCompra;
use common\models\Musica;
use yii\filters\auth\HttpBasicAuth;

class MusicaController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Musica';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),'auth' => function ($username, $password)
            {
                $user = \common\models\User::findByUsername($username);

                if($user && \Yii::$app->getSecurity()->validatePassword($password, $user->password_hash))
                {
                    return $user;
                }
            }
        ];

        return $behaviors;
    }

    public function actionTop5musicas(){
        $compras = Compra::find()->select('id')
            ->where(['efetivada' => 1])
            ->distinct()->all();

        $valores = array();

        foreach ($compras as $compra){
            foreach ($compra->linhaCompras as $lc){
                $numeroVendas = LinhaCompra::find()
                    ->where(['id_compra' => $compra->id])
                    ->count();
                $valores[$lc->id_musica] = $numeroVendas;
            }
        }

        if (isset($valores)){
            arsort($valores );//Ordena pelo valor
        }

        $maisVendidos = array_slice($valores, 0, 5, true);

        $top5musicas = array();

        foreach ($maisVendidos as $idMusica => $nCompras){
            $modelMusica = Musica::findOne($idMusica);
            array_push($top5musicas, $modelMusica);
        }

        return ['top5musicas' => $top5musicas];
    }

    public function actionFindgenerobyid($id){
        $genero = Genero::findOne($id);

        var_dump($genero);
        die();

        return $genero;
    }

}
