<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Compra */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['vercompra' , 'id' => $model->id_utilizador]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'data_compra',
            'valor_total',
            //'id_utilizador',
            [
                'attribute' => 'id_utilizador',
                'value' => $model->utilizador->username,
            ],

        ],
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'nome',
                ['label' => 'Duração',
                    'attribute' => 'duracao'],
                ['label' => 'Preço (€)',
                    'attribute' => 'preco'],
                ['label' => 'Id Álbum',
                    'attribute' => 'id_album'],
            ],
    ])

    ?>

</div>
