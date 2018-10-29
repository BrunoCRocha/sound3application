<?php

use yii\helpers\Html;
use yii\grid\GridView;
/*$this->title = 'Compras de '.$model->username;*/
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="compra-index">

    <h1><?= Html::encode($this->title) ?></h1>


<?= GridView::widget([
    'dataProvider' => $dataProvider,

    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'data_compra',
        'valor_total',
        'id_utilizador',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>