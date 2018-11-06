<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fav_Artista */

$this->title = 'Update Fav  Artista: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fav  Artistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fav--artista-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
