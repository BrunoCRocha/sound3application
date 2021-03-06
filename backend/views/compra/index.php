<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CompraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Compras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Criar Compra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="fundo-form">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'data_compra',
                'valor_total',
                //'id_utilizador',
                ['label' => 'Utilizador',
                    'attribute' => 'id_utilizador',
                    'value' => 'utilizador.username',
                ],

                ['class' => 'yii\grid\ActionColumn',

                    'header'=>"Ações",
                    'headerOptions' => [
                        'style' => 'color:#3277b3',
                    ],
                ],
            ],
        ]); ?>
    </div>

</div>
