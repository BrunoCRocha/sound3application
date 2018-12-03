<?php

use common\models\Album;
use common\models\Musica;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\depdrop\DepDrop;

/* @var $form yii\widgets\ActiveForm */
?>
<div class="compra-form">
    <div class="fundo-form">

    <?php

    $this->registerJsFile(
        '@web/js/reCopy.js',
        ['depends' => [\yii\web\JqueryAsset::className()]]
    );

    $form = ActiveForm::begin( ['action' => ['compra/criar-compra-linha-compra']]); ?>

    <div class="row">
        <br>
        <h3>Dados Referentes à Compra</h3>
        <br>
        <div class="col-sm-6 ">
            <?= $form->field($modelCompra, 'id_utilizador')->label('Utilizador')->dropDownList(
                $listUser,
                array('prompt' => 'Selecione o Utilizador')
            ) ?>

        </div>
        <div class="col-sm-6">
            <?= $form->field($modelCompra, 'data_compra')->widget(DatePicker::className(), [
                'inline' => false,
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-m-dd',
                ],
            ]) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-music"></i> Músicas</h4></div>
        <div class="panel-body">
            <div class="container-items"><!-- widgetContainer -->
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">Linha de compra</h3>
                            <div class="pull-right">
                                <button type="button" class="add btn btn-success btn-xs" rel=".clone" onclick="relCopy()"><i class="glyphicon glyphicon-plus"></i></button>
                                <button type="button" class="remove btn btn-danger btn-xs" onclick="$(this).parent().parent().parent().slideUp(function(){ $(this).remove() }); return false"><i class="glyphicon glyphicon-minus"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                            ?>
                            <div class="row">
                                <div class="clone">
                                    <div class="col-sm-4" >
                                        <?= $form->field($dadosSemValorMusica, '_artista')->label('Artista')->dropDownList($dadosSemValorMusica->artistas,
                                            ['prompt' => 'Selecione o Artista...', 'id'=>'cat-id', 'class' => 'clone form-control']); ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($dadosSemValorMusica, '_album')->label('Álbum')->widget(DepDrop::classname(), [
                                            'options'=>['id'=>'subcat-id', 'class' => 'form-control', 'prompt' => 'Selecione o Álbum...'],
                                            'pluginOptions'=>[
                                                'depends'=>['cat-id'],
                                                'placeholder'=>'Selecione o Álbum...',
                                                'url'=> Url::to(['/dep-demo/subcat'])
                                            ]
                                        ]);?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($modelLinhacompra, 'id_musica')->label('Música')->widget(DepDrop::classname(), [
                                        'options'=>['class' => 'form-control','prompt' => 'Selecione a Música...'],
                                        'pluginOptions'=>[
                                            'depends'=>['cat-id', 'subcat-id'],
                                            'placeholder'=>'Selecione a Música...',
                                            'url'=>Url::to(['/dep-demo/prod'])
                                        ]
                                    ]);?>

                                    </div>
                                </div>
                            </div><!-- .row -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

</div>
