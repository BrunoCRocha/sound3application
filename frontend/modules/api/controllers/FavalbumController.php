<?php

namespace frontend\modules\api\controllers;

use common\models\Album;
use common\models\Artista;
use common\models\Fav_Album;
use common\models\Fav_Artista;
use common\models\Fav_Musica;
use yii\filters\auth\HttpBasicAuth;

class FavalbumController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Fav_Album';


    //Verifica se o Album está nos Favoritos
    public function actionFindfavalbum($userId, $albumId){
        $fav = Fav_Album::find()
            ->where(['and', ['id_utilizador' => $userId, 'id_album' => $albumId]])
            ->one();

        if ($fav != null) {
            return true;
        }
        return false;
    }

    //Verifica as músicas Do Album se estão nos Favoritos
    public function actionFindfavmusica($userId, $musicaId){
        $fav = Fav_Musica::find()
            ->where(['and', ['id_utilizador' => $userId, 'id_musica' => $musicaId]])
            ->one();

        if ($fav != null) {
            return true;
        }
        return false;
    }

    //Criar Favorito Album
    public function actionCriarfavoritoalbum(){
        $idUser = \Yii::$app->request->post('id_utilizador');
        $idAlbum = \Yii::$app->request->post('id_album');

        $climodel = new Fav_Album();
        $climodel->id_utilizador = $idUser;
        $climodel->id_album = $idAlbum;

        $ret = $climodel->save();

        if ($ret == 1) {
            return true;
        } else {
            return false;
        }
    }


    //Vai Buscar todos os Favoritos do User
    public function actionGetallalbunsfavoritos($userId){
        $favAlbum = Fav_Album::find()
            ->where(['id_utilizador' => $userId])
            ->all();

        $album = array();
        foreach ($favAlbum as $favorito) {
            array_push($album, Album::find()
                ->where(['id' => $favorito->id_album])
                ->one());
        }

        return $album;
    }

    //Vais Buscar 5 Albuns aos Favoritos para Mostrar na Atividade dos Favoritos
    public function actionGetalbunsfavoritos($userId){
        $favAlbum = Fav_Album::find()
            ->where(['id_utilizador' => $userId])
            ->all();

        $favAlbum = array_slice($favAlbum, 0, 5, true);

        $albuns = array();
        foreach ($favAlbum as $favorito) {
            array_push($albuns, Album::find()
                ->where(['id' => $favorito->id_album])
                ->one());
        }

        return $albuns;
    }


    public function actionApagarfavalbum($userId, $albumId){
        $favorito = Fav_Album::find()
            ->where(['and', ['id_utilizador' => $userId, 'id_album' => $albumId]])
            ->one();

        if ($favorito != null) {
            $ret = $favorito->delete();

            if ($ret == 1) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

}
