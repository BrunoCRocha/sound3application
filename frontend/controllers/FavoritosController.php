<?php

namespace frontend\controllers;

use common\models\Fav_Album;
use common\models\Fav_Artista;
use common\models\Fav_Genero;
use common\models\Fav_Musica;
use Yii;

class FavoritosController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAddFavArtista($id){

        $userLogado = Yii::$app->user->identity;

        $addFavorito = new Fav_Artista();

        $addFavorito->id_utilizador = $userLogado->id;
        $addFavorito->id_artista = $id;
        $addFavorito->save();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionRemFavArtista($id){

        $userLogado = Yii::$app->user->identity;

        $remFavorito = Fav_Artista::find()
            ->where(['and',['id_utilizador' => $userLogado->getId(), 'id_artista' => $id]])
            ->distinct()
            ->all();

        $remFavorito[0]->delete();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionAddFavAlbum($id){

        $userLogado = Yii::$app->user->identity;

        $addFavorito = new Fav_Album();

        $addFavorito->id_utilizador = $userLogado->id;
        $addFavorito->id_album = $id;
        $addFavorito->save();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionRemFavAlbum($id){

        $userLogado = Yii::$app->user->identity;

        $remFavorito = Fav_Album::find()
            ->where(['and',['id_utilizador' => $userLogado->getId(), 'id_album' => $id]])
            ->distinct()
            ->all();

        $remFavorito[0]->delete();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionAddFavMusica($id){

        $userLogado = Yii::$app->user->identity;

        $addFavorito = new Fav_Musica();

        $addFavorito->id_utilizador = $userLogado->id;
        $addFavorito->id_musica = $id;
        $addFavorito->save();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionRemFavMusica($id){

        $userLogado = Yii::$app->user->identity;

        $remFavorito = Fav_Musica::find()
            ->where(['and',['id_utilizador' => $userLogado->getId(), 'id_musica' => $id]])
            ->distinct()
            ->all();

        $remFavorito[0]->delete();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionAddFavGenero($id){

        $userLogado = Yii::$app->user->identity;

        $addFavorito = new Fav_Genero();

        $addFavorito->id_utilizador = $userLogado->id;
        $addFavorito->id_genero= $id;
        $addFavorito->save();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionRemFavGenero($id){

        $userLogado = Yii::$app->user->identity;

        $remFavorito = Fav_Genero::find()
            ->where(['and',['id_utilizador' => $userLogado->getId(), 'id_genero' => $id]])
            ->distinct()
            ->all();

        $remFavorito[0]->delete();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

}
