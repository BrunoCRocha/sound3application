<?php use yii\grid\GridView;?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',

        ['label' => 'Género',
            'attribute' => 'nome',
        ],

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>