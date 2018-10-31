<?php

namespace backend\controllers;

use common\models\Fav_Artista;
use common\models\Fav_Genero;
use common\models\Fav_Musica;
use common\models\User;
use Yii;
use common\models\Fav_Album;
use common\models\Fav_AlbumSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Fav_AlbumController implements the CRUD actions for Fav_Album model.
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
     * Lists all Fav_Album models.
     * @return mixed
     */

    public function actionShowgenero($idUtilizador){

        $query_genero = Fav_Genero::find()->where(['id_utilizador' => $idUtilizador]);
        $tipo="genero";
        $dataProvider = new ActiveDataProvider([
            'query' => $query_genero]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'idUtilizador' =>$idUtilizador,
            'tipo' => $tipo
        ]);
    }

    public function actionShowartista($idUtilizador){

        $query_artista = Fav_Artista::find()->where(['id_utilizador' => $idUtilizador]);
        $tipo="artista";
        $dataProvider = new ActiveDataProvider([
            'query' => $query_artista]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'idUtilizador' =>$idUtilizador,
            'tipo' => $tipo
        ]);
    }

    public function actionShowalbum($idUtilizador){

        $query_album = Fav_Album::find()->where(['id_utilizador' => $idUtilizador]);
        $tipo="album";
        $dataProvider = new ActiveDataProvider([
            'query' => $query_album]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'idUtilizador' =>$idUtilizador,
            'tipo' => $tipo
        ]);
    }

    public function actionShowmusica($idUtilizador){

        $query_musica = Fav_Musica::find()->where(['id_utilizador' => $idUtilizador]);
        $tipo="musica";
        $dataProvider = new ActiveDataProvider([
            'query' => $query_musica]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'idUtilizador' =>$idUtilizador,
            'tipo' => $tipo
        ]);
    }


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
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
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
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Fav_Album model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Fav_Album model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fav_Album model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fav_Album the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fav_Album::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
