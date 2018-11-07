<?php

namespace frontend\controllers;

use Yii;
use common\models\Fav_Album;
use common\models\Fav_AlbumSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FavalbumController implements the CRUD actions for Fav_Album model.
 */
class FavalbumController extends Controller
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
     * Lists all Fav_Album models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Fav_AlbumSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fav_Album model.
     * @param integer $id_utilizador
     * @param integer $id_album
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_utilizador, $id_album)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_utilizador, $id_album),
        ]);
    }

    /**
     * Creates a new Fav_Album model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Fav_Album();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_utilizador' => $model->id_utilizador, 'id_album' => $model->id_album]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Fav_Album model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_utilizador
     * @param integer $id_album
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_utilizador, $id_album)
    {
        $model = $this->findModel($id_utilizador, $id_album);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_utilizador' => $model->id_utilizador, 'id_album' => $model->id_album]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Fav_Album model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_utilizador
     * @param integer $id_album
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_utilizador, $id_album)
    {
        $this->findModel($id_utilizador, $id_album)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fav_Album model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_utilizador
     * @param integer $id_album
     * @return Fav_Album the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_utilizador, $id_album)
    {
        if (($model = Fav_Album::findOne(['id_utilizador' => $id_utilizador, 'id_album' => $id_album])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
