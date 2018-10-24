<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fav_Musica */

$this->title = 'Update Fav  Musica: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fav  Musicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fav--musica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
