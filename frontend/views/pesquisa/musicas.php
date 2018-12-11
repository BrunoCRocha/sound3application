<?php
use yii\helpers\Url;

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

        <div class="dropdown opc">
            <button onclick="myFunction()" class="dropbtn opc-btn"></button>
            <div id="myDropdown" class="dropdown-content">
                <a href="<?= Url::toRoute(['carrinho/adicionar', 'id' => $musica->id])?>">Adicionar Carrinho</a>
                <a href="#about">Adicionar Favoritos</a>
            </div>
        </div>
    </div>
    <hr class="separador">
</li>


