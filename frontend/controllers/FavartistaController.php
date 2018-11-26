<?php

namespace frontend\controllers;

use Yii;
use common\models\Fav_Artista;
use common\models\Fav_ArtistaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FavartistaController implements the CRUD actions for Fav_Artista model.
 */
class FavartistaController extends Controller
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
     * Lists all Fav_Artista models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Fav_ArtistaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fav_Artista model.
     * @param integer $id_utilizador
     * @param integer $id_artista
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_utilizador, $id_artista)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_utilizador, $id_artista),
        ]);
    }

    /**
     * Creates a new Fav_Artista model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Fav_Artista();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_utilizador' => $model->id_utilizador, 'id_artista' => $model->id_artista]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Fav_Artista model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_utilizador
     * @param integer $id_artista
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_utilizador, $id_artista)
    {
        $model = $this->findModel($id_utilizador, $id_artista);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_utilizador' => $model->id_utilizador, 'id_artista' => $model->id_artista]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Fav_Artista model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_utilizador
     * @param integer $id_artista
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_utilizador, $id_artista)
    {
        $this->findModel($id_utilizador, $id_artista)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fav_Artista model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_utilizador
     * @param integer $id_artista
     * @return Fav_Artista the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_utilizador, $id_artista)
    {
        if (($model = Fav_Artista::findOne(['id_utilizador' => $id_utilizador, 'id_artista' => $id_artista])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
