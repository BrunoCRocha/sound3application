<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Musica */

$this->title = 'Atualizar Música: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Músicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualização';
?>
<div class="musica-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="fundo-form">
        <?= $this->render('_form', [
            'listAlbum' => $listAlbum,
            'model' => $model,
        ]) ?>
    </div>


</div>
