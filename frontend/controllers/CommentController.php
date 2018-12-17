<?php

namespace frontend\controllers;

use common\models\Comment;
use Yii;

class CommentController extends \yii\web\Controller
{

    public function actionIndex($album){
        var_dump('index');
        die();
        return $this->render('_form',[
            'album'=>$album
        ]);
    }

    public function actionCreate($album){
        $modelComment = new Comment();

        if ($modelComment->load(Yii::$app->request->post())) {

            $modelComment->id_album = $album;
            $modelComment->data_criacao = date('Y-m-d');
            $modelComment->id_utilizador = Yii::$app->user->identity->getId();

            //var_dump($modelComment);
            //die();

            if($modelComment->save()) {
                return $this->redirect(['detalhes/album', 'id' => $album]);
            }
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);

        }
    }

    public function actionUpdate($id)
    {
        $model = Comment::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['detalhes/album', 'id' => $id]);
        }

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionDelete($id){
        $model = Comment::findOne($id);

        $model->delete();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }
}