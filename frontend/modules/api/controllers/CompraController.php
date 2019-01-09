<?php

namespace frontend\modules\api\controllers;

use common\models\Compra;
use common\models\LinhaCompra;
use common\models\Musica;
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
    public function actionMusicascompradas($idcompra)
    {
        $compra=Compra::findOne($idcompra);

        $musicas=array();

        foreach ($compra->linhaCompras as $lc) {
            $musica=Musica::findOne($lc->id_musica);
            array_push($musicas,$musica);
        }
        return $musicas;
    }
    public function actionComprasuser($idutilizador)
    {
        //solicitar autenticação
        //$this->getBehavior('authenticator');

        $comprasEfetivadas=$this->getCompras($idutilizador);
        return $comprasEfetivadas;


    }

    public function getCompras($id){
        $comprasEfetivadas=Compra::find()->select('id')->where(['and',['id_utilizador'=> $id,'efetivada'=>1]])->all();
        return $comprasEfetivadas;
    }
}
