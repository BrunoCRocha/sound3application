<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Fav_Album */

$this->title = $model->id_utilizador;
$this->params['breadcrumbs'][] = ['label' => 'Fav  Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fav--album-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_utilizador' => $model->id_utilizador, 'id_album' => $model->id_album], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_utilizador' => $model->id_utilizador, 'id_album' => $model->id_album], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_utilizador',
            'id_album',
        ],
    ]) ?>

</div>
