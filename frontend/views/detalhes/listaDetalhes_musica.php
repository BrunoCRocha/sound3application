<?php
use yii\helpers\Url;

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
    $imgCart = 'add';
}

if($musicasFav != null){
    if(in_array($musica->id, $musicasFav)){
        $textBtnMus = 'heart_white';
        $rotaFavMus = 'rem-fav-musica';
    }else{
        $textBtnMus = 'heart';
        $rotaFavMus = 'add-fav-musica';
    }
} else{
    $textBtnMus = 'heart';
    $rotaFavMus = 'add-fav-musica';
}

?>

<li>
    <div class="musica_album" >
        <h5><?= $musica->duracao ?></h5>
        <h4><?= $musica->nome ?></h4>
        <h5><?= $musica->preco?> €</h5>
        <a class="button_album" href="<?= Url::toRoute(['favoritos/'.$rotaFavMus, 'id' => $musica->id])?>">
            <img src="<?=Yii::getAlias('@menuiconsF').'/'.$textBtnMus?>.svg">
        </a>
        <a class="button_album" href="<?= Url::toRoute(['carrinho/'.$rotaCart, 'id' => $musica->id])?>">
            <img src="<?=Yii::getAlias('@menuiconsF').'/'.$imgCart?>-cart.svg">
        </a>
    </div>
</li>

