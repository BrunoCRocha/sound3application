<?php

use yii\helpers\Html;

?>



<div class="row">

    <div id="resultado_pesquisa">
        <span><h2>Resultado da pesquisa "<?= $search?>"</h2></span>
    </div>

    <div class="col-sm-4" id="menu_opcoes">
            <?= Html::a('Ver Tudo', ['index', 'search' => $search], ['class' => 'menu_pesquisa']) ?>
            <?= Html::a('Músicas', ['musica', 'search' => $search], ['class' => 'menu_pesquisa']) ?>
            <?= Html::a('Álbuns', ['albuns', 'search' => $search], ['class' => 'menu_pesquisa']) ?>
            <?= Html::a('Género', ['genero', 'search' => $search], ['class' => 'menu_pesquisa']) ?>
            <?= Html::a('Artista', ['artista', 'search' => $search], ['class' => 'menu_pesquisa']) ?>
    </div>

    <div class="col-sm-8" id="lista">

        <ul style="margin: 0; padding-left:0">
            <?php
                if($tipo == 'everything'){
                    if(sizeof($generoSearch)== 0 && sizeof($artistaSearch)== 0 && sizeof($albumSearch)== 0 &&sizeof($musicaSearch)== 0){
                        require ('nocontent.php');

                    }else{
                        if($generoSearch != null){ ?>
                            <div class="genero_listagem">Género</div>
                            <?php foreach ($generoSearch as $genero){
                                require ('genero.php');
                            }
                        }

                        if($artistaSearch != null){ ?>
                            <div class="genero_listagem">Artista</div>
                            <?php foreach ($artistaSearch as $artista){
                                require ('artista.php');
                            }
                        }
                        if($albumSearch != null){ ?>
                            <div class="genero_listagem">Album</div>
                            <?php foreach ($albumSearch as $album){
                                require ('albuns.php');
                            }
                        }
                        if($musicaSearch != null){?>
                            <div class="genero_listagem">Música</div>
                            <?php foreach ($musicaSearch as $musica){
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

