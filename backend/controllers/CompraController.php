<?php

namespace backend\controllers;


use common\models\Artista;
use common\models\Album;
use common\models\LinhaCompra;
use common\models\User;
use backend\models\DadosDD;
use Yii;
use common\models\Compra;
use common\models\CompraSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompraController implements the CRUD actions for Compra model.
 */
class CompraController extends Controller
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
     * Lists all Compra models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionVercompra($id){
        $query = Compra::find()->where(['id_utilizador' => $id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Compra model.
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
     * Creates a new Compra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelCompra = new Compra();
        $modelLinhacompra = new LinhaCompra();
        $dadosSemValorMusica = new DadosDD();
        $dadosSemValorMusica->artistas = ArrayHelper::map(Artista::find()->all(),'id','nome');

        if ($modelCompra->load(Yii::$app->request->post()) && $modelLinhacompra->load(Yii::$app->request->post())
            && $modelCompra->save() && $modelLinhacompra->save()) {
            return $this->redirect(['view', 'id' => $modelCompra->id]);
        }

        $query_user = User::find()->all();
        $listUser=ArrayHelper::map($query_user, 'id', 'username');

        return $this->render('create', [
            'modelCompra' => $modelCompra,
            'modelLinhacompra' => $modelLinhacompra,
            'dadosSemValorMusica' => $dadosSemValorMusica,
            'listUser' => $listUser
        ]);
    }

    /**
     * Updates an existing Compra model.
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
     * Deletes an existing Compra model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $linhas = LinhaCompra::find()->where(['id_compra' => $id])->all();

        foreach($linhas as $linha){
            $linha->delete();
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionCriarCompraLinhaCompra(){
        $modelCompra = new Compra();
        $modelLinhacompra = new LinhaCompra();

        if ($modelCompra->load(Yii::$app->request->post()) && $modelCompra->validate() &&
            $modelLinhacompra->load(Yii::$app->request->post()) && $modelLinhacompra->validate()){
            $count = count(Yii::$app->request->post('musicas', []));

            $musicas = [new Setting()];
            for($i = 1; $i < $count; $i++) {
                $settings[] = new Setting();
            }

            $modelLinhacompra->id_compra = $modelCompra->id;
        }



        var_dump('ACERTOU');
        die();
    }

    /**
     * Finds the Compra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Compra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Compra::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionForm_musica($id)
    {
       /* return $this->render('form_musica', [
            'model' => $model,
        ]);*/
    }




}
