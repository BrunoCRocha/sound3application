<?php

use yii\helpers\Html;
$this->title = $artista->nome;

if($estadoFav == null){
    $textbtn = 'Adicionar aos Favoritos';
    $rota = 'add-fav-artista';
} else{
    $textbtn = 'Remover dos Favoritos';
    $rota = 'rem-fav-artista';
}

?>


<div class="body-content" >
    <div class="row" style="margin-bottom: 40px">

        <div class="col-md-6 caixa" style="height: 100%">
            <h1 style="color:white; font-size: 75px"><?=$artista->nome?></h1>
            <h4><?= $artista->nacionalidade?></h4>
            <h4><?= 'Início de Carreira: '.$artista->ano?></h4>
            <?= Html::a($textbtn, ['favoritos/'.$rota, 'id' => $artista->id], ['class'=>'btn btn-success']) ?>
        </div>

        <div class="col-md-4">
            <img class="detalhes-img-artista" src="<?= Yii::getAlias('@artistasF').'/'.$artista->caminhoImagem?>">
        </div>

    </div>

    <hr>

    <div class="row">
        <h2 style="color: white"> <span class="glyphicon glyphicon-music" style="color:#cc0000;margin-left: 20px; padding-right: 20px"></span>Álbuns</h2>
        <div class="box">
            <?php
            foreach ($albunsArtista as $album){
                require ('listaDetalhes_album.php');
            }
            ?>
        </div>
    </div>
</div>