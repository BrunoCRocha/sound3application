<?php

namespace frontend\modules\api\controllers;

use common\models\Album;
use common\models\Artista;
use common\models\Compra;
use common\models\Fav_Artista;
use common\models\Fav_Musica;
use common\models\Musica;
use yii\filters\auth\HttpBasicAuth;

class FavmusicaController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Fav_Musica';

    public function actionGetallmusicasfavoritos($userId){
        $favMusica = Fav_Musica::find()
            ->where(['id_utilizador' => $userId])
            ->all();

        $musicas = array();

        foreach ($favMusica as $favorito){
            array_push($musicas, Musica::find()
                ->where(['id' => $favorito->id_musica])
                ->one());
        }

        $albuns = array();

        foreach ($musicas as $musica){
            array_push($albuns, Album::find()
                ->where(['id' => $musica->id_album])
                ->one());
        }
        $carrinho = Compra::find()
            ->where(['and',['id_utilizador'=> $userId,'efetivada'=>0]])
            ->with('linhaCompras')
            ->one();

        $musicasCarrinho = array();

        foreach ($carrinho->relatedRecords as $lcArray){
            if(count($lcArray) > 0){
                foreach ($lcArray as $lc){
                    array_push($musicasCarrinho, Musica::findOne($lc->id_musica));
                }
            }
        }


        return ['musicas' => $musicas, "albuns" => $albuns, "carrinho" => $musicasCarrinho];
    }

    //SO 5 ALBUNS PARA MOSTRAR NA VIEW FAVORITOS
    public function actionGetmusicasfavoritos($userId){
        $favMusica = Fav_Musica::find()
            ->where(['id_utilizador' => $userId])
            ->all();

        $favMusica = array_slice($favMusica,0, 5, true);

        $musicas = array();
        foreach ($favMusica as $favorito){
            array_push($musicas, Musica::find()
                ->where(['id' => $favorito->id_musica])
                ->one());
        }

        $albuns = array();

        foreach ($musicas as $musica){
            array_push($albuns, Album::find()
                ->where(['id' => $musica->id_album])
                ->one());
        }

        $carrinho = Compra::find()
            ->where(['and',['id_utilizador'=> $userId,'efetivada'=>0]])
            ->with('linhaCompras')
            ->one();

        $musicasCarrinho = array();

        foreach ($carrinho->relatedRecords as $lcArray){
            if(count($lcArray) > 0){
                foreach ($lcArray as $lc){
                    array_push($musicasCarrinho, Musica::findOne($lc->id_musica));
                }
            }
        }


        return ['musicas' => $musicas, "albuns" => $albuns, "carrinho" => $musicasCarrinho];

    }


    public function actionAdicionarmusicafavoritos(){
        $idUser = \Yii::$app->request->post('id_utilizador');
        $idMusica = \Yii::$app->request->post('id_musica');

        $climodel = new Fav_Musica();
        $climodel->id_utilizador = $idUser;
        $climodel->id_musica = $idMusica;

        $ret = $climodel->save();

        return $ret;
    }


    /*public function actionCheckmusicasalbumfavoritos($userId, $albumId){

        $musicasAlbum = Musica::find()
            ->where(['id_album' => $albumId])
            ->all();

        $musicasFavoritos = array();
        $musicasFavAlbum = array();

        foreach ($musicasAlbum as $musica){
            $fav = Fav_Musica::find()
                ->where(['and', ['id_utilizador' => $userId, 'id_musica' => $musica->id]])
                ->one();

            if($fav != null){
                array_push($musicasFavoritos, $musica);
            }
        }

        if(count($musicasFavoritos) > 0){
            foreach ($musicasFavoritos as $m){
                array_push($musicasFavAlbum, Musica::find()->where(['id' => $m->id_musica])->one());
            }
        }

        var_dump($musicasFavAlbum);die();
        return $musicasFavAlbum;
    }*/


    public function actionCheckmusicasfavoritos($userId, $albumId){

        $musicasAlbum = Musica::find()
            ->where(['id_album' => $albumId])
            ->all();

        $musicasFavoritos = array();
        $musicasFavAlbum = array();

        foreach ($musicasAlbum as $musica){
            $fav = Fav_Musica::find()
                ->where(['and',['id_utilizador' => $userId, 'id_musica' => $musica->id]])
                ->one();

            if($fav != null){
                array_push($musicasFavoritos, $musica);
            }

        }

        return $musicasFavoritos;
    }


    public function actionApagarfavoritomusica($userId, $musicaId){
        $model = Fav_Musica::find()
            ->where(['and', ['id_utilizador' => $userId, 'id_musica' => $musicaId]])
            ->one();

        $model->delete();

        return false;
    }

}