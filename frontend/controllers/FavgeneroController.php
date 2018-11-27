<?php

namespace frontend\controllers;

use Yii;
use common\models\Fav_Genero;
use common\models\Fav_GeneroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FavgeneroController implements the CRUD actions for Fav_Genero model.
 */
class FavgeneroController extends Controller
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
     * Lists all Fav_Genero models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Fav_GeneroSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fav_Genero model.
     * @param integer $id_utilizador
     * @param integer $id_genero
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_utilizador, $id_genero)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_utilizador, $id_genero),
        ]);
    }

    /**
     * Creates a new Fav_Genero model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Fav_Genero();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_utilizador' => $model->id_utilizador, 'id_genero' => $model->id_genero]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Fav_Genero model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_utilizador
     * @param integer $id_genero
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_utilizador, $id_genero)
    {
        $model = $this->findModel($id_utilizador, $id_genero);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_utilizador' => $model->id_utilizador, 'id_genero' => $model->id_genero]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Fav_Genero model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_utilizador
     * @param integer $id_genero
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_utilizador, $id_genero)
    {
        $this->findModel($id_utilizador, $id_genero)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fav_Genero model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_utilizador
     * @param integer $id_genero
     * @return Fav_Genero the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_utilizador, $id_genero)
    {
        if (($model = Fav_Genero::findOne(['id_utilizador' => $id_utilizador, 'id_genero' => $id_genero])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
