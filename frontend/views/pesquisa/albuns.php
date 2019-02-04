<?php

use yii\helpers\Url;
use yii\helpers\Html;

if($favAlbPesquisados != null){
    if(in_array($album->id, $favAlbPesquisados)){
        $textbtnfav = 'heart_white';
        $rota = 'rem-fav-album';
    } else {
        $textbtnfav = 'heart';
        $rota = 'add-fav-album';
    }
}else{
    $textbtnfav = 'heart';
    $rota = 'add-fav-album';
}
?>

<li class="item-pesquisa">
    <div id="objeto">
        <div class="imagem_album-musica">
            <a href="<?= Url::toRoute(['detalhes/album', 'id' => $album->id])?>">
                <img src="<?=Yii::getAlias('@albunsF').'/'.$album->caminhoImagem?>">
            </a>
        </div>
        <div class="info_body">
            <h4 class="media-heading">
                <a href="<?= Url::toRoute(['detalhes/album', 'id' => $album->id])?>"><?=$album->nome.' ('.count($album->musicas).')'?></a>
            </h4>
            <h5>
                <a href="<?= Url::toRoute(['detalhes/artista', 'id' => $album->artista->id])?>"><?= $album->artista->nome?></a>
            </h5>
        </div>

        <div class="preco">
            <h5><?=$album->preco?> €</h5>
        </div>
        <div id="imagem_favoritos">
            <a href="<?= Url::toRoute(['favoritos/'.$rota, 'id' => $album->id])?>">
                <img src="<?=Yii::getAlias('@menuiconsF').'/'.$textbtnfav?>.svg">
            </a>
        </div>
        <div id="imagem_carrinho">
            <a href="<?= Url::toRoute(['carrinho/adicionar-album', 'id' => $album->id])?>">
                <img src="<?=Yii::getAlias('@menuiconsF').'/'?>add-cart.svg">
            </a>
        </div>


    </div>
    <hr class="separador">
</li>

