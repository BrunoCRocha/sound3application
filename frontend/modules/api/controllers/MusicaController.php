<?php

namespace frontend\modules\api\controllers;

class MusicaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
