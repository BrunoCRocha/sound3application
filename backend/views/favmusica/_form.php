<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Fav_Musica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fav--musica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_utilizador')->textInput() ?>

    <?= $form->field($model, 'id_musica')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
