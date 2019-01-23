<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Perfil de '.$model->username;

?>
<div class="container " >
    <div class="row conteudo-perfil">
         <h3> <span class="glyphicon glyphicon-user"></span> Perfil Pessoal</h3>
        <br>
        <div id=" textoForm">
            <?php $form = ActiveForm::begin([ 'options' => ['class' => 'form-horizontal formPerfil','method' => 'post', 'action' => 'perfil/update']]);?>

            <?= $form->field($model, 'username' ,['labelOptions'=>['style'=>'color:white,margin-right: 0px;margin-left: 0px;']])->textInput(['id'=>'textUsername','readonly'=> true],['maxlength' => true]) ?>
            <div>
                <p class="textPassword">Password</p>

                <?= Html::passwordInput('password','password',['class' => 'form-control','id'=>'textPassword','readonly'=> true])?>
            </div>

            <br>

            <?= $form->field($model, 'email',['labelOptions'=>['style'=>'color:white']])->textInput(['id'=>'textEmail','readonly'=> true],['maxlength' => true]) ?>

            <div class="form-group">
                    <?= Html::submitButton('<i class="glyphicon glyphicon-check"></i> Guardar', ['class' => 'btn btn-primary', 'disabled' => 'disabled','id'=>'botaoGuardar'])  ?>
                    <button id="botaoEditar" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Editar</button>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

    <div class="row conteudo-perfil" >
        <h3 > <span class="glyphicon glyphicon-music" ></span> Músicas Compradas</h3>
        <div>
            <a href="<?= Url::toRoute(['perfil/downloadtodas'])?>" class="button btn btn-primary" id="botaoDownloadAll">
                <span class="glyphicon glyphicon-edit"></span> Download Todas</a>
            <table id="tabelaMusicas" class="table table-hover ">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Artista</th>
                    <th>Álbum</th>
                    <th>Download</th>
                </tr>
                </thead>
                <tbody id="item-compra">
                    <?php
                    if($arrayMusicas != null) {
                        foreach ($arrayMusicas as $chave => $valor) {
                            foreach ($valor as $chave => $musica) {
                                ?>
                                <tr>

                                <?php
                                echo '<td>' . $musica->nome . '</td>';
                                echo '<td>' . $musica->album->artista->nome . '</td>';
                                echo '<td>' . $musica->album->nome . '</td>';
                                echo '<td><a href="' . Url::toRoute(['perfil/download', 'id' => $musica->id]) . '" <span class="glyphicon glyphicon-download" id="download"></span></td>';
                            } ?>
                            </tr>
                        <?php }
                    } else{
                        $msg = 'Ainda não adquiriu nenhuma música :(';
                    }?>




                </tbody>
                </tbody>

            </table>

            <?php if(isset($msg)){
                echo $msg;
            }?>
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
        document.getElementsByClassName('formPerfil')[0].setAttribute('action',' <?=Url::toRoute(['perfil/update','id' => $model->id])?>');
    }
</script>

