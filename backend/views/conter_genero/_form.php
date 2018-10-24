<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ConterGenero */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conter-genero-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_genero')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
