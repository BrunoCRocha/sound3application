<?php

namespace frontend\modules\api\controllers;

use common\models\Fav_Album;
use common\models\Fav_Artista;
use common\models\Fav_Genero;
use Yii;
use common\models\Fav_Musica;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FavoritosController implements the CRUD actions for FavMusica model.
 */
class FavoritosController extends Controller
{
    public function actionFindfavgenero($iduser,$idgenero){
        $favorito = Fav_Genero::find()->where(['and',['id_utilizador' => $iduser, 'id_genero' => $idgenero]])->one();


        if($favorito != null){
            return "true";
        }

        return "false";
    }

    public function actionFindfavartista($iduser,$idartista){
        $favorito = Fav_Artista::find()->where(['and',['id_utilizador' => $iduser, 'id_artista' => $idartista]])->one();


        if($favorito != null){
            return "true";
        }

        return "false";
    }

    public function actionFindfavalbum($iduser,$idalbum){
        $favorito = Fav_Album::find()->where(['and',['id_utilizador' => $iduser, 'id_album' => $idalbum]])->one();


        if($favorito != null){
            return "true";
        }

        return "false";
    }

    public function actionFindfavmusica($iduser,$idmusica){
        $favorito = Fav_Musica::find()->where(['and',['id_utilizador' => $iduser, 'id_musica' => $idmusica]])->one();


        if($favorito != null){
            return "true";
        }

        return "false";
    }
}
