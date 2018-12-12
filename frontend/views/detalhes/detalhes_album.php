<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>
<div class="body-content" >
    <div class="row" style="" >
        <div class="col-md-2 ">
            <img class="detalhes-img-album" src="<?='..\\..\\common\\img\\capas\\'. $album->caminhoImagem?>">

        </div>
        <div  class="col-md-6 detalhes-descricao-album">
            <h2><?= $album->nome ?></h2>
            <a href="<?= Url::toRoute(['detalhes/artista', 'id' => $album->artista->id])?>"><h4 style="color: white"><?= $album->artista->nome ?></h4></a>
            <h5>Ano: <?= $album->ano ?></h5>
            <h5>Preço: <?= $album->preco ?> €</h5>
            <a href="<?= Url::toRoute(['comment/index','album'=>$album])?>" class="button btn btn-success"> Criar Comentário</a>
        </div>

    </div>
    <hr>
    <div class="row">
        <h2 style="color: white"> <span class="glyphicon glyphicon-music" style="color:#cc0000;margin-left: 20px; padding-right: 20px"></span>Músicas</h2>
        <div class="box">
            <?php
            foreach ($musicasAlbum as $musica){
                require ('listaDetalhes_musica.php');
            }
            ?>
        </div>
    </div>
    <div class="row">
        <h2 style="color: white"> <span class="glyphicon glyphicon-music" style="color:#cc0000;margin-left: 20px; padding-right: 20px"></span>Comentários</h2>
        <div   class="box">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Conteúdo</th>
                    <th>Data do Comentário</th>
                </tr>
                </thead>
                <tbody >
                    <?php
                    foreach ($commentAlbum as $comment){
                        require ('listaDetalhes_comment.php');
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>







