<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Fav_Album */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fav--album-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_utilizador')->textInput() ?>

    <?= $form->field($model, 'id_album')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
