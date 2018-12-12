<?php
use yii\helpers\Url;
use yii\helpers\Html;

if($favArtPesquisados != null){
    if(in_array($artista->id, $favArtPesquisados)){
        $textbtnfav = 'heart_white';
        //$textbtncart = 'sub-cart';
        $rota = 'rem-fav-artista';
    } else {
        $textbtnfav = 'heart';
        //$textbtncart = 'add-cart';
        $rota = 'add-fav-artista';
    }
}else{
    $textbtnfav = 'heart';
    //$textbtncart = 'add-cart';
    $rota = 'add-fav-artista';
}
?>

<li>
    <div class="objeto_genero-musica" >
        <div id="imagem_artista-genero">
            <a href="<?= Url::toRoute(['detalhes/artista', 'id' => $artista->id])?>">
                <img src="<?= '..\\..\\common\\img\\capas'.'\\'.$artista->caminhoImagem?>">
            </a>
        </div>
        <div class="info_body-artista">
            <h4 class="media-heading"><a href="<?= Url::toRoute(['detalhes/artista', 'id' => $artista->id])?>"><?=$artista->nome?></a></h4>
            <h5><?= 'Nº Albuns:'.count($artista->getAlbums())?></h5>
        </div>
        <div id="imagem_favoritos">
            <a href="<?= Url::toRoute(['favoritos/'.$rota, 'id' => $artista->id])?>">
                <img src="../web/menu_icons/<?=$textbtnfav?>.svg">
            </a>
        </div>

    </div>
    <hr class="separador">

</li>
