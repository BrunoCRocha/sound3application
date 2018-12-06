<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Album */


$this->title = 'Perfil de '.$model->username;
?>
<div class="perfil-update">

    <div class="fundo-form">

        <h1>Perfil Pessoal</h1>
        <?= $this->render('index', [
            'model' => $model,
        ]) ?>
    </div>


</div>
