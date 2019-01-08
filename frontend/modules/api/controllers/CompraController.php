<?php

namespace frontend\modules\api\controllers;

use common\models\Compra;
use common\models\LinhaCompra;
use common\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompraController implements the CRUD actions for Compra model.
 */
class CompraController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Compra';
    /**
     * {@inheritdoc}
     */
    /*public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(), 'auth' => function ($username, $password) {
                $user = \common\models\User::findByUsername($username);

                if ($user && \Yii::$app->getSecurity()->validatePassword($password, $user->password_hash)) {
                    return $user;
                }
            }
        ];

        return $behaviors;
    }*/
    public function actionMusicascompradas($id)
    {
        $compras=$this->actionComprasuser($id);
        foreach ($compras as $compra){
            foreach ($compra->linhaCompras as $lc) {

            }
        }
    }
    public function actionComprasuser($id)
    {
        //solicitar autenticação
        //$this->getBehavior('authenticator');

        $comprasEfetivadas=Compra::find()->select('id')->where(['and',['id_utilizador'=> $id,'efetivada'=>1]])->all();
        return $comprasEfetivadas;


    }
}
