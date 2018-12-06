<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use common\models\DownloadMusica;

/* @var $this yii\web\View */
/* @var $model common\models\Musica */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Músicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="musica-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Remover', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pertende eliminar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="fundo-form">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'nome',
                ['label'=>'Duração',
                    'attribute'=>'duracao'],
                ['label'=>'Preço (€)',
                    'attribute'=>'preco'],
                ['label'=>'Álbum',
                    'attribute' => 'album',
                    'value' => $model->album->nome,
                ],
                ['label'=>'Ficheiro MP3',
                    'attribute'=>'caminhoMP3'],
                //'id_album',
            ],
        ]) ?>

        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <?php
                if($model->caminhoMP3 != null)
                {
                    echo 'Alterar Música';
                }else {
                    echo 'Enviar Música';
                }
                ?>
            </a>

        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <?php
                $modelUploadMusica = new \common\models\DownloadMusica();
                $form = ActiveForm::begin(['action' => ['musica/musicupload','id'=>$model->id],
                    'options' => ['method' => 'post','enctype' => 'multipart/form-data'

                    ]]) ?>

                <?= $form->field($modelUploadMusica, 'musicFile')->fileInput() ?>

                <button class="btn btn-success">Enviar Música </button>
            </div>
        </div>



        <?php ActiveForm::end() ?>
    </div>
</div>