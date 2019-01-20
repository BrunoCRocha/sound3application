<?php
namespace backend\controllers;

use common\models\UploadForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'upload', 'download'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $mensagem ='';
        if (!Yii::$app->user->isGuest) {
            //goHome - volta à página principal (login)
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //após receber os dados do form de login e fazer login com os dados
            //verificar se o user possui permissoes para aceder ao backoffice
            if(!(Yii::$app->user->can('readUtilizador'))){
                //como não possui, fazemos logout e notificamos o utilizador da causa do erro
                Yii::$app->user->logout();
                $mensagem = "Não possui privilégios para aceder ao BackOffice!";
                return $this->render('login', [
                    'mensagem' => $mensagem,
                    'model' => $model
                ]);
            } else{
                return $this->goBack();
            }

        } else {

            $model->password = '';

            return $this->render('login', [
                'mensagem' => $mensagem,
                'model' => $model
            ]);
        }
    }
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }


    public function actionDownload(){
        return \Yii::$app->response->sendFile('C:\wamp64\www\sound3application\backend\web\img\genero\Capa-Meteora.jpg');
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
