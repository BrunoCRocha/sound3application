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
                ],
                ['label'=>'SubGénero',
                    'attribute'=>'id_subgenero',
                   // 'value' => $model->conter_genero->nome,
                ],

            ],
        ]) ?>

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
