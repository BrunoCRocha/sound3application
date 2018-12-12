<?php
use yii\helpers\Url;

if($favGenPesquisados != null){
    if(in_array($genero->id, $favGenPesquisados)){
        $textbtnfav = 'heart_white';
        //$textbtncart = 'sub-cart';
        $rota = 'rem-fav-genero';
    } else {
        $textbtnfav = 'heart';
        //$textbtncart = 'add-cart';
        $rota = 'add-fav-genero';
    }
}else{
    $textbtnfav = 'heart';
    //$textbtncart = 'add-cart';
    $rota = 'add-fav-genero';
}
?>

<li>
    <div class="objeto_genero-musica">
        <div id="imagem_artista-genero">
            <img src="<?= '..\\..\\common\\img\\capas'.'\\'.$genero->caminhoImagem?>">
        </div>
        <div class="info_body-genero">
            <h4 class="media-heading"><a href="<?= Url::toRoute(['detalhes/detalhesArtista', 'id' => $genero->id])?>"><?= $genero->nome?></a></h4>
        </div>
        <div id="imagem_favoritos">
            <a href="<?= Url::toRoute(['favoritos/'.$rota, 'id' => $genero->id])?>">
                <img src="../web/menu_icons/<?=$textbtnfav?>.svg">
            </a>
        </div>

    </div>
</li>
