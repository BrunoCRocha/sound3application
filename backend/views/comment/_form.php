<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">
    <div class="fundo-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'conteudo')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'data_criacao')->textInput() ?>

        <?= $form->field($model, 'id_utilizador')->label('Utilizador')->dropDownList(
                $listUtilizador,
                array('prompt' => 'Selecione o Utilizador')
        ) ?>

        <?= $form->field($model, 'id_album')->label('Álbum')->dropDownList(
            $listAlbum,
            array('prompt' => 'Selecione o Album')
        ) ?>

        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
