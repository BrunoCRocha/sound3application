<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Compra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compra-form">
    <div class="fundo-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'data_compra')->textInput() ?>

            <?= $form->field($model, 'valor_total')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'id_utilizador')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
    </div>


    <div class="fundo-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model,'id_artista')->label('Artista')->dropDownList(
            $listArtista,
            array('prompt' => 'Selecione o Artista')
        ) ?>

        <?= $form->field($model,'id_album')->label('Álbum')->dropDownList(
            $listAlbum,
            array('prompt' => 'Selecione o Álbum')
        ) ?>

        <?php ActiveForm::end(); ?>
    </div>


</div>
