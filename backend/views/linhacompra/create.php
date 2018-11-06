<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LinhaCompra */

$this->title = 'Create Linha Compra';
$this->params['breadcrumbs'][] = ['label' => 'Linha Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linha-compra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
