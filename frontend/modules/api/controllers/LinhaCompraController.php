<?php

namespace frontend\modules\api\controllers;

use Yii;
use app\models\LinhaCompra;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LinhaCompraController implements the CRUD actions for LinhaCompra model.
 */
class LinhaCompraController extends Controller
{


    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => LinhaCompra::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id_compra, $id_musica)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_compra, $id_musica),
        ]);
    }


    public function actionCreate()
    {
        $model = new LinhaCompra();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_compra' => $model->id_compra, 'id_musica' => $model->id_musica]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id_compra, $id_musica)
    {
        $model = $this->findModel($id_compra, $id_musica);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_compra' => $model->id_compra, 'id_musica' => $model->id_musica]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id_compra, $id_musica)
    {
        $this->findModel($id_compra, $id_musica)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id_compra, $id_musica)
    {
        if (($model = LinhaCompra::findOne(['id_compra' => $id_compra, 'id_musica' => $id_musica])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
