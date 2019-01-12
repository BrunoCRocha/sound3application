<?php

namespace frontend\modules\api\controllers;

use common\models\Album;
use common\models\Artista;
use common\models\Fav_Artista;
use yii\filters\auth\HttpBasicAuth;

class FavartistaController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Fav_Artista';
}