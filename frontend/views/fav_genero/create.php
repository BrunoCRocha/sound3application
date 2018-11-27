<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Fav_Genero */

$this->title = 'Create Fav  Genero';
$this->params['breadcrumbs'][] = ['label' => 'Fav  Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fav--genero-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
