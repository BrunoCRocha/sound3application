<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
?>
<div class="site-index">
    <div class="body-content" >
        <div class="row" style="width: 100%; height: auto;">
            <h2 style="color: white"> <span class="glyphicon glyphicon-heart" style="color:white;margin-left: 20px; padding-right: 20px">
                </span>Favoritos</h2>

            <ul class="nav nav-tabs ul-tabs-favs" style="margin-top: 40px">
                <li class="active"><a data-toggle="tab" href="#tab_generos">Géneros</a></li>
                <li><a data-toggle="tab" href="#tab_artistas">Artistas</a></li>
                <li><a data-toggle="tab" href="#tab_albuns">Álbuns</a></li>
                <li><a data-toggle="tab" href="#tab_musicas">Músicas</a></li>
            </ul>

            <div class="tab-content tab-content-favoritos">
                <div id="tab_generos" class="tab-pane fade in active">
                    <?php
                    if($favGeneros != null){?>
                        <ul class="lista-favoritos-index">
                            <?php foreach ($favGeneros as $genero){
                                require ('listaFavoritos_generos.php');
                            }
                            ?>
                        </ul>
                        <?php

                    }else{ ?>
                        <div class="favs_msg_vazio">
                            <h3>Sem Géneros Favoritos...</h3>
                            <img src="../web/menu_icons/empty-fav.svg">
                            <h4>Procure por algo que goste e adicione-o à sua lista pessoal de favoritos</h4>

                        </div>
                    <?php } ?>


                </div>
                <div id="tab_artistas" class="tab-pane fade">
                    <?php
                    if($favArtistas != null){?>
                        <ul class="lista-favoritos-index">
                            <?php foreach ($favArtistas as $artista){
                                require ('listaFavoritos_artistas.php');
                            }?>
                        </ul>

                    <?php }else{ ?>
                        <div class="favs_msg_vazio">
                            <h3>Sem Artistas Favoritos...</h3>
                            <img src="../web/menu_icons/empty-fav.svg">
                            <h4>Procure por algo que goste e adicione-o à sua lista pessoal de favoritos</h4>
                        </div>
                    <?php } ?>
                </div>
                <div id="tab_albuns" class="tab-pane fade">
                    <?php
                    if(count($favAlbuns) > 0){?>
                        <ul class="lista-favoritos-index">
                            <?php foreach ($favAlbuns as $album){
                                require ('listaFavoritos_albuns.php');
                            }?>
                        </ul>
                   <?php }else{?>
                        <div class="favs_msg_vazio">
                            <h3>Sem Álbuns Favoritos...</h3>
                            <img src="../web/menu_icons/empty-fav.svg">
                            <h4>Procure por algo que goste e adicione-o à sua lista pessoal de favoritos</h4>
                        </div>
                    <?php } ?>
                </div>
                <div id="tab_musicas" class="tab-pane fade">
                    <?php
                    if(count($favMusicas) > 0){ ?>
                        <ul class="lista-favoritos-index">
                            <?php foreach ($favMusicas as $musica){
                                require ('listaFavoritos_musicas.php');
                            }?>
                        </ul>
                    <?php }else{ ?>
                        <div class="favs_msg_vazio">
                            <h3>Sem Músicas Favoritas...</h3>
                            <img src="../web/menu_icons/empty-fav.svg">
                            <h4>Procure por algo que goste e adicione-o à sua lista pessoal de favoritos</h4>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
</div>
