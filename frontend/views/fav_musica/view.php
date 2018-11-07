<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Fav_Musica */

$this->title = $model->id_utilizador;
$this->params['breadcrumbs'][] = ['label' => 'Fav  Musicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fav--musica-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_utilizador' => $model->id_utilizador, 'id_musica' => $model->id_musica], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_utilizador' => $model->id_utilizador, 'id_musica' => $model->id_musica], [
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
            'id_musica',
        ],
    ]) ?>

</div>
