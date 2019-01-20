<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LinhaCompra */

$this->title = 'Update Linha Compra: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Linha Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="linha-compra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
