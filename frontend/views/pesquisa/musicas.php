<?php
use yii\helpers\Url;

if($favMusPesquisadas != null){
    if(in_array($musica->id, $favMusPesquisadas)){
        $textbtnfav = 'heart_white';
        //$textbtncart = 'sub-cart';
        $rota = 'rem-fav-musica';
    } else {
        $textbtnfav = 'heart';
        //$textbtncart = 'add-cart';
        $rota = 'add-fav-musica';
    }
}else{
    $textbtnfav = 'heart';
    //$textbtncart = 'add-cart';
    $rota = 'add-fav-musica';
}
?>

<li>

    <div class="musica" id="objeto">
        <div class="imagem_album-musica">
            <img src="<?= '..\\..\\common\\img\\capas'.'\\'.$musica->album->caminhoImagem?>">
        </div>
        <div class="info_body">
            <h4 class="media-heading"><?= $musica->nome ?></h4>
            <h5>
                <a href="<?= Url::toRoute(['detalhes/detalhesArtista', 'id' => $musica->id])?>"><?= $musica->album->artista->nome ?></a> -
                <a href="<?= Url::toRoute(['detalhes/detalhesAlbum', 'id' => $musica->id])?>"><?= $musica->album->nome ?></a> -
                <?= $musica->duracao ?>
            </h5>
        </div>


        <div class="preco">
            <h5><?=$musica->preco?>€</h5>
        </div>

        <div id="imagem_favoritos">
            <a href="<?= Url::toRoute(['favoritos/'.$rota, 'id' => $musica->id])?>">
                <img src="../web/menu_icons/<?=$textbtnfav?>.svg">
            </a>
        </div>
        <div id="imagem_favoritos">
            <a href="<?= Url::toRoute(['carrinho/'.$rota, 'id' => $musica->id])?>">
                <img src="../web/menu_icons/<?php/*$textbtncart*/?>.svg">
            </a>
        </div>
    </div>
    <hr class="separador">
</li>


