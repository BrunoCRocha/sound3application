<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Fav_Artista */

$this->title = 'Create Fav  Artista';
$this->params['breadcrumbs'][] = ['label' => 'Fav  Artistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fav--artista-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
