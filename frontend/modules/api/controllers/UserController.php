<?php

namespace frontend\modules\api\controllers;

use common\models\Album;
use common\models\Compra;
use common\models\Musica;
use common\models\User;
use Exception;
use frontend\models\SignupForm;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use Yii;
use yii\helpers\Url;

class UserController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\User';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
    }

    public function actionCreate(){
        $request = Yii::$app->request->post();
        $model = new SignupForm();
        $model->username=$request["username"];
        $model->email=$request["email"];
        $model->password=$request["password"];
        $testeusername = \common\models\User::findByUsername($request["username"]);
        $testeemail = User::find()->select('email')->where(['email' => $request["email"]])->one();

        if($testeusername != null){
            return 1;
        }

        if($testeemail != null){
            return 2;
        }

        if ($user = $model->signup()) {
            //ENVIAR EMAIL DE INFORMAÇÃO
            $compra = new Compra();

            $compra->id_utilizador = $user->getId();
            $compra->efetivada = 0;
            $compra->valor_total = 0;

            $compra->save(false);

            return ["user" => $user];
        }

        return 3;
    }

    public function actionVerificarlogin(){
        $headers = getallheaders ();
        $user = \common\models\User::findByUsername($headers["username"]);

        if($user && \Yii::$app->getSecurity()->validatePassword($headers["password"], $user->password_hash))
        {
            return ["user" => $user];
        }
        return -1;
    }

    public function actionCheckout($userLogado)
    {

        $paypal = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AS-mpIvVyQUAjq7YhTib-Ul5BCM2DMd1SGUjYQXpwqcwmQoBLp5Z7nhpNUh6CnGi8tjCv6XnRs2iJi80',
                'EMKc7zorWkJOhaWH_0daDNHgXW-9uFYYDXCl9L-lAUceRFuE4fIb55X327hIJQ2CybIQBSg4KMeLD8v1'
            )
        );
        //Items carrinho
        $compra = Compra::find()
            ->where(['and', ['id_utilizador' => $userLogado, 'efetivada' => 0]])
            ->with('linhaCompras')
            ->one();

        $musicas = array();

        foreach ($compra->relatedRecords as $lcArray) {
            foreach ($lcArray as $lc) {
                array_push($musicas, Musica::findOne($lc->id_musica));

            }
        }
        //dados necessários para o paypal
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        //lista de items (musicas) com o respetivo nome e preco
        $itemList = new ItemList();
        $total = 0;
        foreach ($musicas as $musica) {
            $item = new Item();

            $item->setName($musica->nome . "-" . $musica->album->artista->nome)
                ->setCurrency('EUR')
                ->setQuantity(1)
                ->setPrice($musica->preco);

            $total += $musica->preco;

            $itemList->addItem($item);
        }

        //mais dados necessários para o paypal (total, subtotal)
        $details = new Details();
        $details->setSubtotal($total);

        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal($total)
            ->setDetails($details);

        //Definir a quantia da transação, a descrição, a lista de items e um id único
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription('Sound3 - Compra de Músicas')
            ->setInvoiceNumber(uniqid());

        //urls de redirect após a transação, consoante o resultado
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl('http://localhost'.Url::toRoute(['pagamento/finish','resultado'=>'true']))
            ->setCancelUrl('http://localhost'.Url::toRoute(['pagamento/finish','resultado'=>'false']));

        //efetuar o pedido
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        try {
            $payment->create($paypal);
        } catch (Exception $e) {
            die($e);
        }

        $UrlConfirmacao = $payment->getApprovalLink();

        return $this->redirect($UrlConfirmacao);
    }

}