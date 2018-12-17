<?php use yii\helpers\Url;?>

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
        <div id="imagem_favoritos_sozinha">
            <a href="<?= Url::toRoute(['favoritos/rem-fav-artista', 'id' => $artista->id])?>">
                <img src="../web/menu_icons/rem-fav.svg">
            </a>
        </div>

    </div>

</li>