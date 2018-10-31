<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MusicaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Músicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="musica-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Criar Música', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="fundo-form">
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
                ['label' => 'Álbum',
                    'attribute' => 'id_album',
                    'value' => 'album.nome'
                ],

                ['class' => 'yii\grid\ActionColumn',
                    'header'=>"Ações",
                        'headerOptions' => [
                            'style' => 'color:#3277b3'
                        ],
                     ],
            ],
        ]); ?>
    </div>

</div>
