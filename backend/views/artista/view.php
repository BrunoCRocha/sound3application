<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Artista */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Artistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artista-view">

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
                'nacionalidade',
                'data_ini_carreira',
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
