<?php

namespace frontend\controllers;

use Yii;
use common\models\Fav_Musica;
use common\models\Fav_MusicaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FavmusicaController implements the CRUD actions for Fav_Musica model.
 */
class FavmusicaController extends Controller
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
     * Lists all Fav_Musica models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Fav_MusicaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fav_Musica model.
     * @param integer $id_utilizador
     * @param integer $id_musica
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_utilizador, $id_musica)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_utilizador, $id_musica),
        ]);
    }

    /**
     * Creates a new Fav_Musica model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Fav_Musica();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_utilizador' => $model->id_utilizador, 'id_musica' => $model->id_musica]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Fav_Musica model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_utilizador
     * @param integer $id_musica
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_utilizador, $id_musica)
    {
        $model = $this->findModel($id_utilizador, $id_musica);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_utilizador' => $model->id_utilizador, 'id_musica' => $model->id_musica]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Fav_Musica model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_utilizador
     * @param integer $id_musica
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_utilizador, $id_musica)
    {
        $this->findModel($id_utilizador, $id_musica)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fav_Musica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_utilizador
     * @param integer $id_musica
     * @return Fav_Musica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_utilizador, $id_musica)
    {
        if (($model = Fav_Musica::findOne(['id_utilizador' => $id_utilizador, 'id_musica' => $id_musica])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
