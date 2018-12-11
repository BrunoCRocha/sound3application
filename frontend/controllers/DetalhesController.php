<?php

namespace frontend\controllers;

use common\models\Album;
use common\models\Artista;
use common\models\Comment;
use common\models\Musica;

class DetalhesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionAlbum($id)
    {
        $album = Album::find()
            ->where(['id' => $id])
            ->one();

        $musicasAlbum = Musica::find()
            ->where(['id_album' => $id])
            ->all();

        $commentAlbum = Comment::find()
            ->where(['id_album' => $id])
            ->all();

        return $this->render('detalhes_album', [
            'id' => $id,
            'album' => $album,
            'musicasAlbum' => $musicasAlbum,
            'commentAlbum' => $commentAlbum
        ]);
    }

    public function actionArtista($id)
    {
        $artista = Artista::findOne($id);

        $albunsArtista = Album::find()
            ->where(['id_artista' => $id])
            ->all();

        return $this->render('detalhes_artista', [
            'id' => $id,
            'artista' => $artista,
            'albunsArtista' => $albunsArtista
        ]);
    }


}
