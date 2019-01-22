<?php

namespace frontend\controllers;

use common\models\Compra;
use common\models\Musica;
use Exception;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use Yii;
use yii\helpers\Url;

class PagamentoController extends \yii\web\Controller
{

    public function actionCheckout()
    {
        $userLogado = Yii::$app->user->identity;

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

    public function actionFinish($resultado){
        if($resultado == true){

            $userLogado = Yii::$app->user->identity;

            $compra = Compra::find()
                ->where(['and', ['id_utilizador' => $userLogado, 'efetivada' => 0]])
                ->with('linhaCompras')
                ->one();

            //registar compra
            $compra->efetivada = 1;
            $compra->data_compra = date('Y-m-d');
            $compra->valor_total = $compra->getValorTotal();
            $compra->save(false);

            //criar carrinho
            $compra = new Compra();
            $compra->efetivada = 0;
            $compra->id_utilizador = $userLogado->getId();
            $compra->save(false);

            $this->redirect(['site/index']);
        }else{
            $this->redirect(['carrinho/index']);
        }
    }

}