<?php

use PayPal\Api\Payer;
use PayPal\Api\Item;

require 'start.php';


if(count($items)>0){
    var_dump($items);
    die();
    $payer = new Payer();
    $payer->setPaymentMethod('paypal');

    foreach ($items as $musica) {
        $item = new Item();
        $item->setName($musica->nome);

    }


}