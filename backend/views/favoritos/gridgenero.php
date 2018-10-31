<?php use yii\grid\GridView;?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'id_utilizador',
        'id_genero',
        'id_subgenero',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>