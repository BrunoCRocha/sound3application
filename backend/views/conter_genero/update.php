<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ConterGenero */

$this->title = 'Update Conter Genero: ' . $model->id_subgenero;
$this->params['breadcrumbs'][] = ['label' => 'Conter Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_subgenero, 'url' => ['view', 'id' => $model->id_subgenero]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="conter-genero-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
