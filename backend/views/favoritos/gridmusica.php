<?php use yii\grid\GridView;?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',

        ['label' => 'Música',
            'attribute' => 'id_musica',
            'value' => 'musica.nome'
        ],

        ['label' => 'Artista',
            'attribute' => 'id_musica',
            'value' => 'musica.album.artista.nome'
        ],

        ['label' => 'Album',
            'attribute' => 'id_musica',
            'value' => 'musica.album.nome'
        ],

        ['class' => 'yii\grid\ActionColumn'],
    ]
]); ?>
