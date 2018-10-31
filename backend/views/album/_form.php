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

<?php
$query_artista = Artista::find()->all();
$listArtita=ArrayHelper::map($query_artista, 'id', 'nome');

$query_genero= Genero::find()->all();
$listaGenero=ArrayHelper::map($query_genero,'id','nome');

$query_subgenero = ConterGenero::find()->all();
$listaSubGenero=ArrayHelper::map($query_subgenero,'id','nome');
?>

<div class="album-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_lancamento')->textInput() ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_artista')->label('Artista')->dropDownList(
        $listArtita,
        array('prompt' => 'Selecione o Artista')

    ) ?>

    <?= $form->field($model, 'id_genero')->label('Género')->dropDownList(
            $listaGenero,
            array('prompt' => 'Selecione o Género')
    ) ?>

    <?= $form->field($model, 'id_subgenero')->label('SubGénero')->dropDownList(
            $listaSubGenero,
            array('prompt' => 'Selecione o SubGéneros')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
