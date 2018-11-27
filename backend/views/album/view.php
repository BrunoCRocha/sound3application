<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Album */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Álbuns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-view">

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
        <span class="botoes_extra">
            <?= Html::a('Ver Comentários', ['comment/index', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
        </span>

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
                ['label'=>'Data de Lançamento',
                    'attribute' =>'data_lancamento'],
                ['label'=>'Preço',
                    'attribute'=>'preco'],
                //'id_artista',
                ['label'=>'Artista',
                    'attribute' => 'id_artista',
                    'value' => $model->artista->nome, // or use 'usertable.name'
                ],
                ['label'=>'Género',
                    'attribute' => 'id_genero',
                    'value' => $model->genero->nome, // or use 'usertable.name'
                ]

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
                $form = ActiveForm::begin(['action' => ['album/imageupload','id'=>$model->id],
                    'options' => ['method' => 'post','enctype' => 'multipart/form-data'

                    ]]) ?>

                <?= $form->field($modelUpload, 'imageFile')->fileInput() ?>

                <button class="btn btn-success">Enviar Imagem </button>
            </div>
        </div>




        <?php ActiveForm::end() ?>
    </div>
</div>
