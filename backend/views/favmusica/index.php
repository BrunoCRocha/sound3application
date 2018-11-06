<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Fav_MusicaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Favorito Músicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fav--musica-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Géneros', ['favgenero/index', 'idUtilizador' => $idUtilizador], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Artistas', ['favartista/index', 'idUtilizador' => $idUtilizador],['class' => 'btn btn-info']) ?>
        <?= Html::a('Álbuns', ['favalbum/index', 'idUtilizador' => $idUtilizador], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Músicas', ['favmusica/index', 'idUtilizador' => $idUtilizador], ['class' => 'btn btn-info']) ?>
    </p>

    <div class="fundo-form">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                ['header' => 'ID da Música Favorito',
                    'attribute' => 'id',
                    'headerOptions' => [
                        'style' => 'color:#3277b3'
                    ],
                ],

                ['label' => 'Música',
                    'attribute' => 'id_musica',
                    'value' => 'musica.nome'
                ],

                ['label' => 'Artista',
                    'attribute' => 'id_musica',
                    'value' => 'musica.album.artista.nome'
                ],

                ['label' => 'Álbum',
                    'attribute' => 'id_musica',
                    'value' => 'musica.album.nome'
                ],
                ['class' => 'yii\grid\ActionColumn',
                    'header'=>"Ações",
                    'headerOptions' => [
                        'style' => 'color:#3277b3'
                    ],
                    'template' => '{delete}',
                    'visibleButtons' => [
                        'delete' => function ($url, $idUtilizador) {
                            $url = Url::to(['favgenero/index' ]);
                            return Html::a('Delete', $url, ['class' => 'btn btn-info'] );
                        },
                    ],
                ],
            ],
        ]); ?>
    </div>

</div>
