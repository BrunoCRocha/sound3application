<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ArtistaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Artistas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artista-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Artista', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="fundo-form">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'nome',
                'nacionalidade',

                ['label' => 'Data de Início de Carreira',
                    'attribute' => 'ano',
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
