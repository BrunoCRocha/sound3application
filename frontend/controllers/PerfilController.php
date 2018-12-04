<?php

namespace frontend\controllers;

use common\models\User;
use common\models\UserSearch;
use Yii;

class PerfilController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $model = User::findOne($id);

        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model,
        ]);
    }

    public function actionUpdate($id){


        $model = User::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

}
