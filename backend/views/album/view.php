<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Album */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Álbuns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Remover', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pretende eliminar?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Ver Comentários', ['comment/index', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="fundo-form">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'nome',
                'data_lancamento',
                'preco',
                'id_artista',
                'id_genero',
                'id_subgenero',
            ],
        ]) ?>
    </div>


</div>
