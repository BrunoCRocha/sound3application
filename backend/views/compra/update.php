<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Compra */

$this->title = 'Update Compra: ' . $modelCompra->id;
$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelCompra->id, 'url' => ['view', 'id' => $modelCompra->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="compra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelCompra' => $modelCompra,
        'modelLinhacompra' => $modelLinhacompra,
        'dadosSemValorMusica' => $dadosSemValorMusica,
        'listUser' => $listUser
    ]) ?>

</div>
