<?php

namespace frontend\controllers;

use common\models\Fav_Album;
use common\models\Fav_Artista;
use Yii;

class FavoritosController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionArtista($id){

        $userLogado = Yii::$app->user->identity;

        $addFavorito = new Fav_Artista();

        $addFavorito->id_utilizador = $userLogado->id;
        $addFavorito->id_artista = $id;

        $query = Fav_Artista::find()->where('and',['id_utilizador' => $addFavorito->id_utilizador
            ,'id_artista' => $addFavorito->id_artista]);

        //var_dump($query);
        //die();

        if(!$query==null){
            return;
        }

        $addFavorito->save();

        $artistasFavoritos = Fav_Artista::find()->where(['id_utilizador' => $id])->all();
        var_dump($artistasFavoritos);
        die();

        return $this->render('index', [
            'id' => $id,
            'artistasFavoritos' => $artistasFavoritos
        ]);
    }

    public function actionGenero($id){

        return $this->render('index', [
            'id' => $id
        ]);
    }

    public function actionMusica($id){

        return $this->render('index', [
            'id' => $id
        ]);
    }

    public function actionAlbum($id)
    {

        return $this->render('index', [
            'id' => $id
        ]);
    }

}
