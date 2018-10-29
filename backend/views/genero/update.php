<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Genero */

$this->title = 'Atualizar Género: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Géneros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualização';
?>
<div class="genero-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="fundo-form">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>


</div>
