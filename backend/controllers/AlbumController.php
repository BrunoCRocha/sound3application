<?php

namespace backend\controllers;

use common\models\Artista;
use common\models\Comment;
use common\models\ConterGenero;
use common\models\Fav_Album;
use common\models\Genero;
use common\models\Musica;
use common\models\UploadForm;
use common\models\User;
use Yii;
use common\models\Album;
use common\models\AlbumSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AlbumController implements the CRUD actions for Album model.
 */
class AlbumController extends Controller
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
                    'only' => ['view','create', 'update', 'delete'],
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['view'],
                            'roles' => ['admin','mod'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['create'],
                            'roles' => ['admin','mod'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['update'],
                            'roles' => ['admin','mod'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['delete'],
                            'roles' => ['admin','mod'],
                        ],
                    ],
                ],
        ];
    }

    /**
     * Lists all Album models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlbumSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Album model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        /*$query = Comment::find()->where(['id_album' => $id]);

        $provider = new ActiveDataProvider([
            'query' => $query
        ]);*/

        return $this->render('view', [
            'model' => $this->findModel($id),
            //'provider' => $provider
        ]);

        /*return $this->render('view', [
            'model' => $this->findModel($id),
        ]);*/
    }

    public function actionImageupload()
    {
        $model = new UploadForm();

        $tipo = 'artista';

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload($tipo)) {
                // file is uploaded successfully
                $idalbum=Yii::$app->request->get('id');
                $album= Album::findOne($idalbum);
                if($album != null){
                    $album->caminhoImagem = $model->caminhoFinal;
                    $album->save(false);
                }
            }
        }
        return $this->render('view', ['model' => $album]);
    }

    /**
     * Creates a new Album model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Album();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $query_artista = Artista::find()->all();
        $listArtista=ArrayHelper::map($query_artista, 'id', 'nome');

        $query_genero= Genero::find()->all();
        $listGenero=ArrayHelper::map($query_genero,'id','nome');

        return $this->render('create', array(
            'listArtista' => $listArtista,
            'listGenero' =>$listGenero,
            'model' => $model
        ));
    }

    /**
     * Updates an existing Album model.
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

        $query_artista = Artista::find()->all();
        $listArtista=ArrayHelper::map($query_artista, 'id', 'nome');

        $query_genero= Genero::find()->all();
        $listGenero=ArrayHelper::map($query_genero,'id','nome');

        return $this->render('update', [
            'listArtista' => $listArtista,
            'listGenero' =>$listGenero,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Album model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */


    //Serve para eliminar tudo o que esteja associado ao Album em causa
    public function actionDelete($id)
    {
        $album=$this->findModel($id);

        if($album!=null){
            $album->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Album model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Album the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
//ArrayHelper::map($query_subgenero,'id','nome');

    protected function findModel($id)
    {
        if (($model = Album::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

/*protected function findModel($id)
{
    if (($model = Album::findOne($id)) !== null) {
        $query = Artista::findOne($model->id_artista);
        var_dump($query);
        $model->id_artista = $query->nome;

        return $model;
    }

    throw new NotFoundHttpException('The requested page does not exist.');
}*/