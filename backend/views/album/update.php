<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Album */

$this->title = 'Atualizar Álbum: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Álbuns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualização';
?>
<div class="album-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="fundo-form">
        <?= $this->render('_form', [
            'model' => $model,
            'listArtista' =>$listArtista,
            'listGenero' => $listGenero
        ]) ?>
    </div>


</div>
