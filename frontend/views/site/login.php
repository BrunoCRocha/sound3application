<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div class="site-login" style="text-align: center">
     <div class="fundo-form form-login" >
             <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>

             <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

             <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

             <?= $form->field($model, 'password')->passwordInput() ?>

             <?= $form->field($model, 'rememberMe')->label('Guardar Dados')->checkbox() ?>

             <div style="color:#999;margin:1em 0">
                 Esqueceu-se da sua password? <?= Html::a('Altere-a', ['site/request-password-reset']) ?>.
             </div>

             <div class="form-group">
                 <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
             </div>

             <?php ActiveForm::end(); ?>
     </div>




</div>
