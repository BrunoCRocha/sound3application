<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Album;

/* @var $this yii\web\View */
/* @var $model common\models\Musica */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="musica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duracao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_album')->label('Album') ->dropDownList(
            $listAlbum,
            array('prompt' => 'Selecione o Álbum')
    )?>
    <?= $form->field($model, 'posicao')->label('Posição no Álbum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'caminhoMP3')->label('Caminho Música')->textInput(['maxlength' => true])  ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
