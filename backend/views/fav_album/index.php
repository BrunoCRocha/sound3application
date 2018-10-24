<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Fav_AlbumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fav  Albums';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fav--album-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fav  Album', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_utilizador',
            'id_album',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
