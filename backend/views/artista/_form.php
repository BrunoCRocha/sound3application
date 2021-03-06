<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Artista */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artista-form">

    <div class="fundo-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nacionalidade')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ano')->textInput(['maxlenght'=>true])?>

        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>




</div>
