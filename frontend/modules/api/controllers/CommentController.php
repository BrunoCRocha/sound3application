<?php

namespace frontend\modules\api\controllers;

use common\models\Album;
use common\models\User;
use Yii;
use common\models\Comment;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CommentController implements the CRUD actions for Comment model.
 */

class CommentController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Comment';

    public function actionGetallcomments($albumId){
        $comments = Comment::find()
            ->where(['id_album'=>$albumId])
            ->all();

        $users = array();
        foreach ($comments as $comment){
            array_push($users,  User::find()
                ->where(['id' => $comment->id_utilizador])
                ->one());
        }

        return ["comments" => $comments, "users" => $users];
        return $comments;
    }

    public function actionCriarcomment(){
        $conteudo = \Yii::$app->request->post('conteudo');
        $data = \Yii::$app->request->post('data_criacao');
        $albumId = \Yii::$app->request->post('id_album');
        $userId = \Yii::$app->request->post('id_utilizador');

        $comment= new Comment();
        $comment->conteudo = $conteudo;
        $comment->data_criacao = $data;
        $comment->id_utilizador = $userId;
        $comment->id_album = $albumId;

        $check = $comment->save();

        return $check;
    }

    public function actionRemovecomment($commentId){
        $comment = Comment::findOne($commentId);

        $check=$comment->delete();

        if($check == 1){
            $check = true;
        } else{
            $check = false;
        }
        return $check;
    }
}
