<?php
use yii\helpers\Url;

if($favMusPesquisadas != null){
    if(in_array($musica->id, $favMusPesquisadas)){
        $textbtnfav = 'heart_white';
        $rota = 'rem-fav-musica';
    } else {
        $textbtnfav = 'heart';
        $rota = 'add-fav-musica';
    }
}else{
    $textbtnfav = 'heart';
    $rota = 'add-fav-musica';
}

if($itemsCarrinho != null){
    if(in_array($musica->id, $itemsCarrinho)){
        $rotaCart = 'remover';
        $imgCart = 'sub';
    }else{
        $rotaCart = 'adicionar';
        $imgCart = 'add';
    }
}
else{
    $rotaCart = 'adicionar';
    $imgCart = 'sub';
}
?>

<li>

    <div class="musica" id="objeto">
        <div class="imagem_album-musica">
            <img src="<?=Yii::getAlias('@albunsF').'/'.$musica->album->caminhoImagem?>">
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
            <h5><?=$musica->preco?> €</h5>
        </div>

        <div id="imagem_favoritos">
            <a href="<?= Url::toRoute(['favoritos/'.$rota, 'id' => $musica->id])?>">
                <img src="<?=Yii::getAlias('@menuiconsF').'/'.$textbtnfav?>.svg">
            </a>
        </div>
        <div id="imagem_carrinho">
            <a href="<?= Url::toRoute(['carrinho/'.$rotaCart, 'id' => $musica->id])?>">
                <img src="<?=Yii::getAlias('@menuiconsF').'/'.$imgCart?>-cart.svg">
            </a>
        </div>
    </div>
    <hr class="separador">
</li>


