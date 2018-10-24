<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ConterGeneroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Conter Generos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conter-genero-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Conter Genero', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_subgenero',
            'id_genero',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
