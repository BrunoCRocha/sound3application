<?php

use yii\helpers\Url;
use yii\helpers\Html;


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

        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn"></button>
            <div id="myDropdown" class="dropdown-content">
                <a href="#home">Adicionar Carrinho</a>
                <a href="#about">Adicionar Favoritos</a>
            </div>
        </div>

    </div>
    <hr class="separador">
</li>

