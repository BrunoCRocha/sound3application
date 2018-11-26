<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fav_Genero */

$this->title = 'Update Fav  Genero: ' . $model->id_utilizador;
$this->params['breadcrumbs'][] = ['label' => 'Fav  Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_utilizador, 'url' => ['view', 'id_utilizador' => $model->id_utilizador, 'id_genero' => $model->id_genero]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fav--genero-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
