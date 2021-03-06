<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AlbumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Álbuns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Criar Álbum', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="fundo-form">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'nome',
                ['label' => 'Data de Lançamento',
                    'attribute' => 'ano'],

                ['label' => 'Preço (€)',
                    'attribute' => 'preco'],

                ['label' => 'Artista (ID)',
                    'attribute' => 'id_artista',
                    'value' => 'artista.nome',
                ],

                ['label' => 'Género(ID)',
                    'attribute' => 'id_genero',
                    'value' => 'genero.nome',
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
