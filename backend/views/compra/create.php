<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Compra */

$this->title = 'Criar Compra';
$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'listArtista'=>$listArtista,
        'listAlbum'=>$listAlbum,
        'model' => $model,
    ]) ?>

</div>
