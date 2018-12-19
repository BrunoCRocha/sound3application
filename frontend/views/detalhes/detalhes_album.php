<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

if($estadoFav == null){
    $textbtn = 'Adicionar aos Favoritos';
    $rotaFav = 'add-fav-album';
} else{
    $textbtn = 'Remover dos Favoritos';
    $rotaFav = 'rem-fav-album';
}

?>

<div class="body-content" >
    <div class="row" style="" >
        <div class="col-md-2 ">
            <img class="detalhes-img-album" src="<?=Yii::getAlias('@albunsF').'/'. $album->caminhoImagem?>">

        </div>
        <div  class="col-md-6 detalhes-descricao-album">
            <h2><?= $album->nome ?></h2>
            <a href="<?= Url::toRoute(['detalhes/artista', 'id' => $album->artista->id])?>"><h4 style="color: white"><?= $album->artista->nome ?></h4></a>
            <h5>Ano: <?= $album->ano ?></h5>
            <h5>Preço: <?= $album->preco ?> €</h5>
            <a data-toggle="modal" data-target="#modalComment" class="button btn btn-success" name="criarComment-button"> Criar Comentário</a>
            <a href="<?= Url::toRoute(['favoritos/'.$rotaFav,'id'=>$album->id])?>" class="button btn btn-success"><?=$textbtn?></a>

            <!-- Modal -->
            <div class="modal fade" id="modalComment" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header modal-comment-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>Adicionar comentário a <?=$album->nome?></h3>
                        </div>
                        <?php $form=ActiveForm::begin(['action' => ['comment/create', 'album' => $album->id]])?>
                            <div class="modal-body modal-comment-body">
                                <div class="form-group">
                                    <?= $form->field($modelComment, 'conteudo')->textarea(['rows' => '5', 'options' =>['resize' => 'vertical']]); ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="guardar-button">Guardar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        <?php ActiveForm::end()?>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="row">

        <ul class="nav nav-tabs ul-tabs-detalhes" id="myTab">
            <li class="active"><a data-toggle="tab" href="#tab_musicas">Músicas (<?= count($musicasAlbum)?>)</a></li>
            <li><a data-toggle="tab" href="#tab_comentarios">Comentários (<?= count($commentAlbum)?>)</a></li>
        </ul>

        <div class="tab-content tab-content-favoritos">
            <div id="tab_musicas" class="tab-pane fade in active">
                <?php

                    foreach ($musicasAlbum as $musica){

                        require ('listaDetalhes_musica.php');
                    }
                ?>
            </div>
            <div id="tab_comentarios" class="tab-pane fade in">
                <?php
                    foreach ($commentAlbum as $comment){
                        require ('listaDetalhes_comment.php');
                    }
                ?>
            </div>
        </div>


    </div>
    <div class="row">

    </div>
</div>







