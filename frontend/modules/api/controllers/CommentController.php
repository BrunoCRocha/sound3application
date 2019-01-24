<?php

namespace frontend\modules\api\controllers;


use common\models\Comment;

class CommentController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Comment';

    public function actionGetallcomments($albumId){
        $comments = Comment::find()
            ->where(['id_album' => $albumId])
            ->all();

        return $comments;
    }

    public function actionCriarcomment(){
        $conteudo = \Yii::$app->request->post('conteudo');
        $dataCriacao = \Yii::$app->request->post('data_criacao');
        $idUser = \Yii::$app->request->post('id_utilizador');
        $idAlbum = \Yii::$app->request->post('id_album');

        $comment = new Comment();
        $comment->conteudo = $conteudo;
        $comment->data_criacao = $dataCriacao;
        $comment->id_utilizador = $idUser;
        $comment->id_album = $idAlbum;

        $ret = $comment->save();

        return $ret;
    }

}
