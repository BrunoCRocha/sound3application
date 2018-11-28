<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

?>
<div class="site-index" id="display">

    <div class="body-content" >
        <ul id="pills_nav" >
            <li><a href="#menu_home" onclick="return false">Home</a></li>
            <li><a href="#menu_albums" onclick="return false">Album</a></li>
            <li><a href="#menu_musicas" onclick="return false">Musicas</a></li>
            <li><a href="#menu_artistas" onclick="return false">Artistas</a></li>
        </ul>

        <hr id="hr_pills" width="50%">

            <div class="tab-content" >
                <div id="menu_home" class="resume">
                    
                </div>
                <div id="menu_albums" class="resume">
                    <?php require_once('miniFiles/albuns_site.php')?>
                </div>
                <div id="menu_musicas" class="resume">

                </div>
                <div id="menu_artistas" class="resume">

                </div>
            </div>


            <div class="row" id="caixa_conteudo">
                <div class="col-sm-9" id="fds">
                    <h2 class="rowTitle">Fire</h2>
                    <div class="row">
                        <?php foreach ($arrayMusicas as $musica) {?>
                            <div class="col-4 col-sm-2">
                                <div id="caixa_conteudo" >
                                    <img class="imagem" src="../web/imagens/kamikaze.jpg" class="rounded mx-auto d-block">
                                    <h2><?= $musica->nome?></h2>
                                    <h3><?= $musica->album->artista->nome?></h3>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

    </div>
</div>
