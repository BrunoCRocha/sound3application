<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Fav_Genero */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fav--genero-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_utilizador')->textInput() ?>

    <?= $form->field($model, 'id_genero')->textInput() ?>

    <?= $form->field($model, 'id_subgenero')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
