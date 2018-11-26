<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Fav_Musica */

$this->title = 'Create Fav  Musica';
$this->params['breadcrumbs'][] = ['label' => 'Fav  Musicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fav--musica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
