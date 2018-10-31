<?php use yii\grid\GridView;?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'id_utilizador',
        'id_artista',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>