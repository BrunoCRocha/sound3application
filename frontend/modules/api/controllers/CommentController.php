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
class CommentController extends \yii\rest\ActiveController{
    public $modelClass = 'common\models\Comment';

    public function actionGetallcomments($albumId){
         $album = Album::findOne($albumId);

         return $album->comments;
    }
}
