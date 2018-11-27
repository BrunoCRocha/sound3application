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
                    <?php require_once('miniFiles/home_site.php')?>
                </div>
                <div id="menu_albums" class="resume">
                    <?php require_once('miniFiles/albuns_site.php')?>
                </div>
                <div id="menu_musicas" class="resume">
                    <?php require_once('miniFiles/musicas_site.php')?>
                </div>
                <div id="menu_artistas" class="resume">
                    <?php require_once('miniFiles/artistas_site.php')?>
                </div>
            </div>



    </div>
</div>
