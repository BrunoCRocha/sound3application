<?php

namespace frontend\controllers;

class PagamentoController extends \yii\web\Controller
{

    public function actionCheckout($items)
    {
        return $this->render('checkout', [
            'items' => $items
        ]);
    }
}