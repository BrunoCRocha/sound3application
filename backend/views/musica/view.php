<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Musica */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Músicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="musica-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Remover', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pertende eliminar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="fundo-form">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'nome',
                'duracao',
                'preco',
                [
                    'attribute' => 'album',
                    'value' => $model->album->nome,
                ],
                //'id_album',
            ],
        ]) ?>
    </div>


</div>
