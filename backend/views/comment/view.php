<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */

$this->title = "Comentário ID: ".$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comentários', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-view">

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
    </p>
    <div class="fundo-form">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'conteudo',
                'data_criacao',
                ['label'=>'Utilizador',
                    'attribute' => 'id_utilizador',
                    'value'=>$model->utilizador->username,
                ],
                ['label'=>'Álbum',
                    'attribute' => 'id_album',
                    'value' => $model->album->nome,
                ],
            ],
        ]) ?>
    </div>
</div>
