<?php

namespace backend\controllers;

use Yii;
use common\models\Fav_Genero;
use common\models\Fav_GeneroSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Fav_GeneroController implements the CRUD actions for Fav_Genero model.
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
            'access' =>
                ['class' => \yii\filters\AccessControl::className(),
                    'only' => ['view', 'create', 'update', 'delete'],
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['view'],
                            'roles' => ['admin', 'Moderador'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['create'],
                            'roles' => ['admin', 'Moderador'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['update'],
                            'roles' => ['admin', 'Moderador'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['delete'],
                            'roles' => ['admin', 'Moderador'],
                        ],
                    ],
                ],
        ];
    }

    /**
     * Lists all Fav_Genero models.
     * @return mixed
     */
    public function actionIndex($idUtilizador)
    {

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

    /**
     * Displays a single Fav_Genero model.
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
     * Creates a new Fav_Genero model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Fav_Genero();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Fav_Genero model.
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
     * Deletes an existing Fav_Genero model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_utilizador,$id_genero)
    {
        $model = Fav_Genero::find()->where(['and',['id_utilizador'=>$id_utilizador,'id_genero'=>$id_genero]])->one();
        $model->delete();

        return $this->redirect(['index', 'idUtilizador' => $model->id_utilizador]);
    }

    /**
     * Finds the Fav_Genero model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fav_Genero the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fav_Genero::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
