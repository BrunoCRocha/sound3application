<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>

<div class="row">

    <div class="col-sm-6" id="album_box">
        <div id="info_album">
            <img src="../web/imagens/kamikaze.jpg">
            <div id="content_album">
                <h2><?= $album->nome ?></h2>
                <h4><?= $album->artista->nome ?></h4>
                <h5><?= $album->data_lancamento ?></h5>
                <h5><?= $album->preco ?></h5>

                <?= Html::a('Carrinho', ['index', 'id' => $album->id], ['class' => 'butao_opcoes']) ?>
                <?= Html::a('Favoritos', ['index', 'id' => $album->id], ['class' => 'butao_opcoes']) ?>
                <!--<button id="b_album_carrinho"><img src="../web/menu_icons/shopping_cart_black.svg">Carrinho</button>
                <button id="b_album_favoritos"><img src="../web/menu_icons/heart_black.svg">Favoritos</button>-->

            </div>
        </div>

    </div>
    <div class="col-sm-6">
        <div id="lista_musicas">
            <div id="buttons_album">
                <button>Musicas</button>
                <button>Comentários</button>
            </div>
            <ul>
                <?php
                    foreach ($musicasAlbum as $musica){
                        require ('listaDetalhes_musica.php');
                    }
                ?>

                <?php
                    foreach ($commentAlbum as $comment){
                        require ('listaDetalhes_comment.php');
                    }
                ?>
            </ul>
        </div>
    </div>

</div>
