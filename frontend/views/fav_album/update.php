<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fav_Album */

$this->title = 'Update Fav  Album: ' . $model->id_utilizador;
$this->params['breadcrumbs'][] = ['label' => 'Fav  Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_utilizador, 'url' => ['view', 'id_utilizador' => $model->id_utilizador, 'id_album' => $model->id_album]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fav--album-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
