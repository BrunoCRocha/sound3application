<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comentários';
$this->params['breadcrumbs'][] = ['label' => 'Álbuns', 'url' => ['album/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Criar Comentário', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="fundo-form">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                ['label'=>'Conteúdo',
                    'attribute'=>'conteudo'],
                ['label' => 'Data de Criação',
                    'attribute' =>  'data_criacao'],
                ['label'=>'Utilizador',
                    'attribute' => 'id_utilizador',
                    'value' => 'utilizador.username',
                ],
                ['label'=>'Álbum',
                    'attribute' => 'id_album',
                    'value' => 'album.nome',
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
