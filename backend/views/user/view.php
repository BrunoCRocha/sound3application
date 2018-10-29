<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Remover', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'tem a certeza que pretende eliminar?',
                'method' => 'post',
            ],
        ]) ?>
        <span style="float: right"><?= Html::a('Ver Favoritos', ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
            <?= Html::a('Ver Compras', ['ver-compras', 'id' => $model->id], ['class' => 'btn btn-info']) ?></span>
    </p>
    <div class="fundo-form">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'username',
                'auth_key',
                'password_hash',
                'password_reset_token',
                'email:email',
                'status',
                'created_at',
                'updated_at',
            ],
        ]) ?>
    </div>


</div>
