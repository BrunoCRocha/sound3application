<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Fav_Genero */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fav  Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fav--genero-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="fundo-form">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'id_utilizador',
                'id_genero',
                'id_subgenero',
            ],
        ]) ?>
    </div>


</div>
