<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Perfil de '.$model->username;

?>
<div class="container  " >
    <div class="row ">
        <h3>Perfil Pessoal</h3>
        <div>
            <?php $form = ActiveForm::begin(['class' => 'form-horizontal', 'options' => ['method' => 'post', 'action' => [Url::toRoute('perfil/update')]]]); ?>

            <?= $form->field($model, 'username')->textInput(['id'=>'textUsername','readonly'=> true],['maxlength' => true]) ?>

            <p class="textPassword"> Password</p>

            <?= Html::passwordInput('password','password',['class' => 'form-control','id'=>'textPassword','readonly'=> true])?>
            <p>  </p>

            <?= $form->field($model, 'email')->textInput(['id'=>'textEmail','readonly'=> true],['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary', 'disabled' => 'disabled','id'=>'botaoGuardar'])  ?>
                <button id="botaoEditar" class="btn btn-primary">Editar</button>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

    <div class="row ">
        <h3>Músicas Compradas</h3>
        <div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Artista</th>
                    <th>Álbum</th>
                    <th>Download</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($arrayMusicas as $chave => $valor){
                        foreach($valor as $chave => $musica) {
                            ?>
                            <tr>

                            <?php
                            echo '<td>' . $musica->nome . '</td>';
                            echo '<td>' . $musica->album->artista->nome . '</td>';
                            echo '<td>' . $musica->album->nome . '</td>';
                            echo '<td><a href="'.Url::toRoute(['perfil/download','id'=>$musica->id]).'" <span class="glyphicon glyphicon-download" id="download"></span></td>';
                        }?>

                        </tr>
                    <?php }
                    ?>
                </tbody>
                </tbody>

            </table>
        </div>
    </div>
</div>


<script>
    document.getElementById('botaoEditar').onclick = function() {
        document.getElementById('textUsername').removeAttribute('readonly');
        document.getElementById('textEmail').removeAttribute('readonly');
        document.getElementById('textPassword').removeAttribute('readonly');
        document.getElementById('botaoGuardar').removeAttribute('disabled');
        document.getElementById('botaoEditar').setAttribute("disabled", "disabled");
    }
</script>

