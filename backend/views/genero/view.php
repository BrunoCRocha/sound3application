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

        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <?php
                if($model->caminhoImagem != null)
                {
                    echo 'Alterar Imagem';
                }else {
                    echo 'Enviar Imagem';
                }
                ?>
            </a>

        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <?php
                $modelUpload = new \common\models\UploadForm();
                $form = ActiveForm::begin(['action' => ['genero/imageupload','id'=>$model->id],
                    'options' => ['method' => 'post','enctype' => 'multipart/form-data'

                    ]]) ?>

                <?= $form->field($modelUpload, 'imageFile')->fileInput() ?>

                <button class="btn btn-success">Enviar Imagem </button>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>
