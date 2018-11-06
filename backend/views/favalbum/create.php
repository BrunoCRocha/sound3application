<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Fav_Album */

$this->title = 'Create Fav  Album';
$this->params['breadcrumbs'][] = ['label' => 'Fav  Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fav--album-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
