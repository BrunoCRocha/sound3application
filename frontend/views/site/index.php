<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <div class="container">
            <ul class="nav nav-pills" id="pills_nav">
                <li class="active"><a data-toggle="pill" href="#menu_home">Home</a></li>
                <li><a data-toggle="pill" href="#menu_albuns">Albuns</a></li>
                <li><a data-toggle="pill" href="#menu_musicas">Músicas</a></li>
                <li><a data-toggle="pill" href="#menu_artistas">Artistas</a></li>
            </ul>

            <div class="tab-content">
                <div id="menu_home" class="tab-pane fade in active">
                    <?php require_once('miniFiles/home_site.php')?>
                </div>
                <div id="menu_albuns" class="tab-pane fade">
                    <?php require_once('miniFiles/albuns_site.php')?>
                </div>
                <div id="menu_musicas" class="tab-pane fade">
                    <?php require_once('miniFiles/musicas_site.php')?>
                </div>
                <div id="menu_artistas" class="tab-pane fade">
                    <?php require_once('miniFiles/artistas_site.php')?>
                </div>
            </div>
        </div>
    </div>
</div>
