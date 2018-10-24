<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Fav_ArtistaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fav  Artistas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fav--artista-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fav  Artista', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_utilizador',
            'id_artista',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
