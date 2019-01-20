<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LinhaCompraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Linha Compras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linha-compra-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Linha Compra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="fundo-form">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'id_compra',
                'id_musica',
                ['label' => 'Música',
                    'attribute' => 'musica.nome'],

                ['label' => 'Artista',
                    'attribute' => 'musica.artista.nome'],

                ['label' => 'Artista',
                    'attribute' => 'musica.preco'],
            ],
        ]); ?>
    </div>

</div>
