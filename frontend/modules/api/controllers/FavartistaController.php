<?php

namespace frontend\modules\api\controllers;

use common\models\Album;
use common\models\Artista;
use common\models\Fav_Artista;
use yii\filters\auth\HttpBasicAuth;

class FavartistaController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Fav_Artista';

    //Vai Buscar todos os artistas nos Favoritos do User
    public function actionGetallartistasfavoritos($userId){
        $favArtista = Fav_Artista::find()
            ->where(['id_utilizador' => $userId])
            ->all();

        $artista = array();
        foreach ($favArtista as $favorito){
            array_push($artista, Artista::find()
                ->where(['id' => $favorito->id_artista])
                ->one());
        }

        return $artista;
    }

    //SO 5 ALBUNS PARA MOSTRAR NA VIEW FAVORITOS
    public function actionGetartistasfavoritos($userId){
        $favArtista = Fav_Artista::find()
            ->where(['id_utilizador' => $userId])
            ->all();

        $favArtista = array_slice($favArtista,0, 5, true);

        $artistas = array();
        foreach ($favArtista as $favorito){
            array_push($artistas, Artista::find()
            ->where(['id' => $favorito->id_artista])
                ->one());
        }

        return $artistas;
    }


    //Verifica se o Artista está nos Favoritos
    public function actionFindfavartista($userId, $artistaId){
        $fav = Fav_Artista::find()
            ->where(['and',['id_utilizador' => $userId, 'id_artista' => $artistaId]])
            ->one();

        if($fav != null){
            return true;
        }
        return false;
    }


    //Criar Favorito Artista
    public function actionCriarfavoritoartista(){
        $idUser = \Yii::$app->request->post('id_utilizador');
        $idArtista = \Yii::$app->request->post('id_artista');

        $climodel = new Fav_Artista();
        $climodel->id_utilizador = $idUser;
        $climodel->id_artista = $idArtista;

        $ret = $climodel->save();

        if($ret == 1){
            return true;
        }else{
            return false;
        }
    }


    // Apagar Favorito Artista
    public function actionApagarfavoritoartista($userId, $artistaId){

        $model = Fav_Artista::find()
            ->where(['and', ['id_utilizador' => $userId, 'id_artista' => $artistaId]])
            ->one();

        $ret = $model->delete();

        if($ret == 1){
            return false;
        }else{
            return true;
        }

    }
}

