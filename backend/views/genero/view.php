<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Genero */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Géneros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genero-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Remover', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pretende eliminar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="fundo-form">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                ['label'=>'Imagem',
                    'attribute' =>'caminhoImagem',
                    'value'=>
                    (($model->caminhoImagem != null) ?
                        $model->caminhoImagem :
                        ("Sem Imagem"))
                    ,

                        (($model->caminhoImagem != null) ?
                        '\'format\' =>[\'image\',[\'width\'=>\'100\',\'height\'=>\'100\']]':
                        ("Sem imagem"))
                    ],
                'nome',
                'descricao',
            ],
        ]) ?>

         <?php /* FileUpload::widget([
            'model' => $model,
            'attribute' => 'caminhoImagem',
            'url' => ['genero/imageupload', 'id' => $model->id], // your url, this is just for demo purposes,
            'options' => ['accept' => 'image/*'],
            'clientOptions' => [
                'maxFileSize' => 2000000
            ],
            // Also, you can specify jQuery-File-Upload events
            // see: https://github.com/blueimp/jQuery-File-Upload/wiki/Options#processing-callback-options


        ]);
        <form >
            <input id="fileupload" type="file" name="files[]" data-url="<?= Yii::getAlias('@genero')?>" multiple>

            <script>
            $(function () {
                $('#fileupload').fileupload({
                    dataType: 'html',
                    url: <?= Url::toRoute('genero/imageupload')?>,
                    done: function (e, data) {
                        $.each(data.result.files, function (index, file) {
                            $('<p/>').text(file.name).appendTo(document.body);
                        });
                    }
                });
            });

            </script>
            <button type="submit">Upload</button>
        </form>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="../js/vendor/jquery.ui.widget.js"></script>
        <script src="../js/jquery.iframe-transport.js"></script>
        <script src="../js/jquery.fileupload.js"></script>*/?>
        <?php
            $modelUpload = new \common\models\UploadForm();
            $form = ActiveForm::begin(['action' => [Url::toRoute('genero/imageupload')],
                'options' => ['method' => 'post','enctype' => 'multipart/form-data'

                ]]) ?>

            <?= $form->field($modelUpload, 'imageFile')->fileInput() ?>

            <button>Submit</button>

        <?php ActiveForm::end() ?>

    </div>


</div>
