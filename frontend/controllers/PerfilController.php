<?php

namespace frontend\controllers;

use common\models\LinhaCompra;
use common\models\Musica;
use common\models\User;
use common\models\UserSearch;
use Yii;
use common\models\Compra;

class PerfilController extends \yii\web\Controller
{
    public function actionIndex($id)
    {


        $model = User::findOne($id);

        $model->setPassword(Yii::$app->request->post('password'));

        $query_Compra=Compra::find()
            ->where(['id_utilizador'=> Yii::$app->user->identity->getId()])->all();

        foreach ($query_Compra as $compra){

            $arrayLC[$compra->id] = LinhaCompra::find()
                ->where(['id_compra'=> $compra->id])->all();
        }

        foreach ($arrayLC as $chave => $valor){
            foreach ($valor as $chave =>$lc){
                $arrayMusicas[$lc->id_musica] = Musica::find()
                    ->where(['id'=> $lc->id_musica])->all();
            }
        }
        return $this->render('index', [
            'model'=>$model,
            'arrayMusicas'=>$arrayMusicas

        ]);
    }

    public function actionUpdate($id){

        $model = User::findOne($id);

        if ($model->load(Yii::$app->request->post())) {

            $updatePerfil = Yii::$app->request->post('User');

            $model->setPassword(Yii::$app->request->post('password'));

            $model->username = $updatePerfil['username'];

            $model->save(false);

            return $this->redirect(['index', 'id' => $model->id]);
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }
    public function actionDownload($id){

        $model = Musica::findOne($id);

        $file = $model->caminhoMP3;
        $path = '..\\..\\common\\musicas\\'.$file;


        /*var_dump($path);
        die();*/
        if (file_exists($path)) {

            return \Yii::$app->response->sendFile($path);

        }


    }

}
