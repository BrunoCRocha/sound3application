<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Album */


$this->title = 'Perfil de '.$model->username;
?>
<div class="album-update">

    <h1>Perfil Pessoal</h1>

    <div class="fundo-form">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>


</div>
