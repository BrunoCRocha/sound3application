<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\Comment;

?>

<!-- Modal content-->
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"></button>

    </div>
    <div class="modal-body">
        <div class="blog-form">

            <?php

            $form = ActiveForm::begin(
                [
                    'id' => 'my-form-id',
                    'action' => Url::to(['comment/create'])
                ]
            ); ?>

            <?= $form->field($album, 'conteudo')->textInput(['maxlength' => true]) ?>

            <?= $form->field($album, 'data_criacao')->textInput() ?>

            <?= $form->field($album, 'id_utilizador')->label('Utilizador')->dropDownList(
                $listUtilizador,
                array('prompt' => 'Selecione o Utilizador')
            ) ?>

            <?= $form->field($album, 'id_album')->label('Álbum')->dropDownList(
                $listAlbum,
                array('prompt' => 'Selecione o Album')
            ) ?>


            <div class="form">
                <input type="submit" class="btn btn-primary" value="<?= Yii::t('app', 'send') ?>">
            </div>


            <?php ActiveForm::end(); ?>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>

</div>