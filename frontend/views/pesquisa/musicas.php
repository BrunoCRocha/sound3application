<?php
?>

<li>
    <div class="musica" id="objeto_musica">
        <div class="ole" id="imagem_musica">
            <img src="<?= $musica->album->caminhoImagem ?>">
        </div>
        <div id="media_body">
            <h4 class="media-heading"><?= $musica->nome ?> - <?= $musica->album->artista->nome ?></h4>
            <p><h5><?=$musica->album->nome?></h5></p>
            <div id="butoes_menu">
                <p>
                    <button class="butao_opcoes">Add Favoritos</button>
                    <button class="butao_opcoes">Add Carrinho</button>
                </p>
            </div>
        </div>
        <div id="musica_tempo">
            <h5><?= $musica->duracao ?></h5>
        </div>
        <div id="media_buttons">
            <div>
                <button class="media_button" id="butao_play"></button>
            </div>
        </div>
    </div>
</li>
