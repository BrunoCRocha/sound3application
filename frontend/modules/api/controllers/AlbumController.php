<?php

namespace frontend\modules\api\controllers;

use common\models\Album;
use common\models\Compra;
use common\models\LinhaCompra;
use common\models\Musica;
use yii\filters\auth\HttpBasicAuth;

class AlbumController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Album';

    /*public function behaviors()
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
    }*/


    public function actionTopalbuns(){

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

        //para utilizar em querys diferentes;
        $artistasPopulares = array();

        //top5 musicas + compradas
        $arrayMusicas = array();

        foreach ($maisVendidos as $idMusica => $nCompras){
            $modelMusica = Musica::findOne($idMusica);
            array_push($arrayMusicas, $modelMusica);
        }


        $albuns = array();

        foreach ($arrayMusicas as $musica){
            array_push($albuns, Album::findOne($musica->id_album));
        }


        return $albuns;
    }

    public function actionAlbunsrecentes(){
        $albuns = Album::find()->all();

        $inverter = array_reverse($albuns);

        $albunsMaisRecentes = array_slice($inverter, 0 , 5, true);

        return $albunsMaisRecentes;
    }
  
    public function actionFindalbumbyid($id){
        $album = Album::findOne($id);

        return $album;
    }

    public function actionFindmusicas($id){
        $album = Album::findOne($id);

        return $album->musicas;
    }

    public function actionFindalbumbysearch($search){
        $albumSearch = Album::find()
            ->where(['like', 'nome', $search])
            ->all();

        return $albumSearch;
    }

}
