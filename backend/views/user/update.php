<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Atualizar User: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualização';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="fundo-form">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>


</div>
