<?php

use yii\helpers\Url;
use yii\helpers\Html;

if($favAlbPesquisados != null){
    if(in_array($album->id, $favAlbPesquisados)){
        $textbtnfav = 'heart_white';
        //$textbtncart = 'sub-cart';
        $rota = 'rem-fav-album';
    } else {
        $textbtnfav = 'heart';
        //$textbtncart = 'add-cart';
        $rota = 'add-fav-album';
    }
}else{
    $textbtnfav = 'heart';
    //$textbtncart = 'add-cart';
    $rota = 'add-fav-album';
}
?>

<li>
    <div id="objeto">
        <div class="imagem_album-musica">
            <img src="<?= '..\\..\\common\\img\\capas'.'\\'.$album->caminhoImagem?>">
        </div>
        <div class="info_body">
            <h4 class="media-heading">
                <a href="<?= Url::toRoute(['detalhes/album', 'id' => $album->id])?>"><?=$album->nome?></a>
            </h4>
            <h5>
                <a href="<?= Url::toRoute(['pesquisa/detalhesArtista', 'id' => $album->id])?>"><?= $album->artista->nome?></a>
                <a href="<?= Url::toRoute(['pesquisa/detalhesAlbum', 'id' => $album->id])?>"><?= '10 músicas' ?></a>
            </h5>
        </div>

        <div class="preco">
            <h5><?=$album->preco?>€</h5>
        </div>
        <div id="imagem_favoritos">
            <a href="<?= Url::toRoute(['favoritos/'.$rota, 'id' => $album->id])?>">
                <img src="../web/menu_icons/<?=$textbtnfav?>.svg">
            </a>
        </div>
        <div id="imagem_favoritos">
            <a href="<?= Url::toRoute(['carrinho/'.$rota, 'id' => $album->id])?>">
                <img src="../web/menu_icons/<?php/*$textbtncart*/?>.svg">
            </a>
        </div>


    </div>
    <hr class="separador">
</li>

