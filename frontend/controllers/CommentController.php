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

    public function actionCreate(){
        $model = new Comment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['detalhes/album', 'id' => $model->id]);
        }
    }
}