<?php

use yii\helpers\Html;

?>



<div class="row">

    <span>
        <h2>Resultado da pesquisa "<?= $search?>"</h2>
    </span>

    <div class="col-sm-4" id="menu_opcoes">
        <div>
            <?= Html::a('Ver Tudo', ['index', 'search' => $search], ['class' => 'cool-link']) ?>
            <?= Html::a('Músicas', ['musica', 'search' => $search], ['class' => 'cool-link']) ?>
            <?= Html::a('Álbuns', ['albuns', 'search' => $search], ['class' => 'cool-link']) ?>
            <?= Html::a('Género', ['genero', 'search' => $search], ['class' => 'cool-link']) ?>
            <?= Html::a('Artista', ['artista', 'search' => $search], ['class' => 'cool-link']) ?>

            <!--<button class="cool-link"><img src="../web/menu_icons/search_black.svg">Resultados</button>
            <button class="cool-link"><img src="../web/menu_icons/music-player_black.svg">Músicas</button>
            <button class="cool-link"><img src="../web/menu_icons/compact-disc_black.svg">Álbuns</button>
            <button class="cool-link"><img src="../web/menu_icons/hand_black.svg">Género</button>
            <button class="cool-link"><img src="../web/menu_icons/microphone_black.svg">Artistas</button>-->
        </div>

    </div>

    <div class="col-sm-8" id="lista">

        <ul>
            <?php
                if($tipo == 'everything'){
                    if(sizeof($generoSearch)== 0 && sizeof($artistaSearch)== 0 && sizeof($albumSearch)== 0 &&sizeof($musicaSearch)== 0){
                        require ('nocontent.php');

                    }else{
                        if($generoSearch != null){
                            foreach ($generoSearch as $genero){
                                require ('genero.php');
                            }
                        }

                        if($artistaSearch != null){
                            foreach ($artistaSearch as $artista){
                                require ('artista.php');
                            }
                        }
                        if($albumSearch != null){
                            foreach ($albumSearch as $album){
                                require ('albuns.php');
                            }
                        }
                        if($musicaSearch != null){
                            foreach ($musicaSearch as $musica){
                                require ('musicas.php');
                            }
                        }
                    }
                }

                if($tipo == 'musica'){
                    if(sizeof($musicaSearch) == 0){
                        require ('nocontent.php');
                    }else{
                        foreach ($musicaSearch as $musica){
                            require ('musicas.php');
                        }
                    }

                }
                if($tipo == 'album'){
                    if(sizeof($albumSearch) == 0){
                        require ('nocontent.php');
                    }else{
                        foreach ($albumSearch as $album){
                            require ('albuns.php');
                        }
                    }

                }
                if($tipo == 'genero') {
                    if (sizeof($generoSearch) == 0) {
                        require('nocontent.php');
                    } else {
                        foreach ($generoSearch as $genero) {
                            require('genero.php');
                        }
                    }
                }


                if($tipo == 'artista') {
                    if (sizeof($artistaSearch) == 0) {
                        require('nocontent.php');
                    } else {
                        foreach ($artistaSearch as $artista) {
                            require('artista.php');
                        }
                    }
                }
            ?>
        </ul>
    </div>
</div>

