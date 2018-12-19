<?php

namespace frontend\modules\api\controllers;

use Yii;
use app\models\FavMusica;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FavoritosController implements the CRUD actions for FavMusica model.
 */
class FavoritosController extends Controller
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
     * Lists all FavMusica models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => FavMusica::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FavMusica model.
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
     * Creates a new FavMusica model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FavMusica();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_utilizador' => $model->id_utilizador, 'id_musica' => $model->id_musica]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FavMusica model.
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
     * Deletes an existing FavMusica model.
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
     * Finds the FavMusica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_utilizador
     * @param integer $id_musica
     * @return FavMusica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_utilizador, $id_musica)
    {
        if (($model = FavMusica::findOne(['id_utilizador' => $id_utilizador, 'id_musica' => $id_musica])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
