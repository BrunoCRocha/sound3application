<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */


$this->title = 'Perfil de '.$model->username;

?>
<div class="user-view">

    <h1>Perfil Pessoal</h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>
    <div class="fundo-form">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'username',
                //'auth_key',
                //'password_hash',
               // 'password_reset_token',
                'email:email',
               //'status',
               // 'created_at',
               // 'updated_at',
            ],
        ]) ?>
    </div>


</div>

