<?php
namespace frontend\controllers;


use common\models\Album;
use common\models\Artista;
use common\models\Compra;
use common\models\LinhaCompra;
use common\models\Musica;
use common\models\User;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

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
                'only' => ['logout', 'signup', 'login'],
                'rules' => [
                    [
                        'actions' => ['signup', 'login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login'],
                        'allow' => false,
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('login', ['exception' => $exception]);
        }
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        /*Query de dados random*/


        $randletra = substr(str_shuffle(str_repeat("abcdefghijklmnoprstuvz", 5)), 0, 1);

        $randmus = rand(0,2);
        $arrayArtistas = Artista::find()
            ->where(['like', 'nome', $randletra])
            ->limit(5)
            ->all();


        $arrayMusicas = array();
        foreach($arrayArtistas as $artista){
            array_push($arrayMusicas, $artista->albums[0]->musicas[$randmus]);
        }


        /* Query de Mais Vendidos

          $compras = Compra::find()->select('id')
            ->where(['efetivada' => 1])
            ->distinct()->all();

        $valores = array();

        foreach ($compras as $compra){
            foreach ($compra->linhaCompras as $lc){
                    $numeroVendas = LinhaCompra::find()
                        ->where(['id_compra' => $compra->id])
                        ->count();
                    $valores[$lc->id_musica] = $numeroVendas;
            }
        }
      
        if (isset($valores)){
            arsort($valores );//Ordena pelo valor
        }*/

//        $maisVendidos = array_slice($valores, 0, 5, true);
//
//        //para utilizar em querys diferentes;
//        $artistasPopulares = array();
//
//        //top5 musicas + compradas
//        $arrayMusicas = array();
//
//        foreach ($maisVendidos as $idMusica => $nCompras){
//            $modelMusica = Musica::findOne($idMusica);
//            array_push($arrayMusicas, $modelMusica);
//        }



        /*var_dump($maisVendidos, $arrayMusicas);
        die();*/

        return $this->render('index',[
            'arrayMusicas' => $arrayMusicas
        ]);

    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            var_dump("oi".$model->login());

            $userLogado = Yii::$app->user->identity;

            $query = Compra::find()
                ->where(['and',['id_utilizador'=> $userLogado,'efetivada'=>0]])->all();

            if($query == null){
                $compra = new Compra();
                //$compra->data_compra = date("Y-m-d");
                $compra->valor_total = 0;
                $compra->id_utilizador = $userLogado;
                $compra->efetivada = 0;
            }

            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['site/login']);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                $compra = new Compra();

                $compra->id_utilizador = $user->getId();
                $compra->efetivada = 0;
                $compra->valor_total = 0;

                $compra->save(false);
                $model->sendEmail();
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }



        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }



}
