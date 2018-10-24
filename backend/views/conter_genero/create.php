<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ConterGenero */

$this->title = 'Create Conter Genero';
$this->params['breadcrumbs'][] = ['label' => 'Conter Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conter-genero-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
