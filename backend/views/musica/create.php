<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Musica */

$this->title = 'Create Musica';
$this->params['breadcrumbs'][] = ['label' => 'Musicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="musica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
