<?php

namespace frontend\modules\api\controllers;

use common\models\Album;
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

        $arrayFinal = array();

        /*foreach ($comments as $comment){
            $comment->id_utilizador=$comment->utilizador->username;
        }*/

        return $comments;
    }

    public function actionCreatecomment(){
        $userId = \Yii::$app->request->post('userId');
        $albumId = \Yii::$app->request->post('albumId');
        $conteudo = \Yii::$app->request->post('conteudo');

        $comment= new Comment();
        $comment->id_album=$albumId;
        $comment->id_utilizador=$userId;
        $comment->conteudo=$conteudo;
        $comment->data_criacao=date('Y-m-d');
        $check=$comment->save();

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
