<?php

use common\models\Artista;
use common\models\ConterGenero;
use common\models\Genero;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Album */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="album-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_lancamento')->textInput() ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_artista')->label('Artista')->dropDownList(
            $listArtista,
            array('prompt' => 'Selecione o Artista')
    ) ?>

    <?= $form->field($model, 'id_genero')->label('Género')->dropDownList(
            $listGenero,
            array('prompt' => 'Selecione o Género')
    ) ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
