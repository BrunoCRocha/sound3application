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
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all LinhaCompra models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => LinhaCompra::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LinhaCompra model.
     * @param integer $id_compra
     * @param integer $id_musica
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_compra, $id_musica)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_compra, $id_musica),
        ]);
    }

    /**
     * Creates a new LinhaCompra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
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

    /**
     * Updates an existing LinhaCompra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_compra
     * @param integer $id_musica
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
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

    /**
     * Deletes an existing LinhaCompra model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_compra
     * @param integer $id_musica
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_compra, $id_musica)
    {
        $this->findModel($id_compra, $id_musica)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LinhaCompra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_compra
     * @param integer $id_musica
     * @return LinhaCompra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_compra, $id_musica)
    {
        if (($model = LinhaCompra::findOne(['id_compra' => $id_compra, 'id_musica' => $id_musica])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
