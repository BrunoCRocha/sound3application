<?php

namespace backend\controllers;

use common\models\Album;
use common\models\DownloadMusica;
use common\models\Fav_Musica;
use common\models\LinhaCompra;
use common\models\User;
use Yii;
use common\models\Musica;
use common\models\MusicaSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MusicaController implements the CRUD actions for Musica model.
 */
class MusicaController extends Controller
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
                            'roles' => ['admin','Moderador'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['create'],
                            'roles' => ['admin','Moderador'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['update'],
                            'roles' => ['admin','Moderador'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['delete'],
                            'roles' => ['admin'],
                        ],
                        [
                            'allow' => false,
                            'actions' => ['delete'],
                            'roles' => ['Moderador'],
                        ],
                    ],
                ],
        ];
    }

    /**
     * Lists all Musica models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MusicaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Musica model.
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
     * Creates a new Musica model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Musica();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $query_album = Album::find()->all();
        $listAlbum=ArrayHelper::map($query_album, 'id', 'nome');


        return $this->render('create', array(
            'listAlbum' => $listAlbum,
            'model' => $model
        ));

    }


    /**
     * Updates an existing Musica model.
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

        $query_album = Album::find()->all();
        $listAlbum=ArrayHelper::map($query_album, 'id', 'nome');

        return $this->render('update', [
            'listAlbum' => $listAlbum,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Musica model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    //Serve para eliminar tudo o que esteja associado a Musica em causa
    public function actionDelete($id)
    {
        $musica=$this->findModel($id);
        $musica->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Musica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Musica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionMusicupload(){

        $model = new DownloadMusica();

        if(Yii::$app->request->isPost)
        {
            $model->musicFile = UploadedFile::getInstance($model,'musicFile');
            if($model->upload())
            {
                $idmusica=Yii::$app->request->get('id');
                $musica=Musica::findOne($idmusica);

                if($musica != null)
                {
                    $musica->caminhoMP3=$model->caminhoFinal;
                    $musica->save(false);
                }
            }
        }
        return $this->render('view',['model'=>$musica]);
    }


    protected function findModel($id)
    {
        if (($model = Musica::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
