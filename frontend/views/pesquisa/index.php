<?php

use yii\helpers\Html;

$this->title = 'Pesquisa de '. $search;

$this->registerJsFile(
    '@web/js/menu_pesquisa.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

?>

<div class="row">

    <div id="resultado_pesquisa">
        <h2><span class="glyphicon glyphicon-search icon-title"></span>Resultados de pesquisa para: "<?= $search?>"</h2>
    </div>

    <div class="col-sm-4" id="menu_opcoes">
            <?= Html::a('Ver Tudo', ['index', 'search' => $search], ['class' => 'menu_pesquisa', 'id' => 'opc1']) ?>
            <?= Html::a('Músicas', ['musica', 'search' => $search], ['class' => 'menu_pesquisa', 'id' => 'opc2']) ?>
            <?= Html::a('Álbuns', ['albuns', 'search' => $search], ['class' => 'menu_pesquisa', 'id' => 'opc3']) ?>
            <?= Html::a('Género', ['genero', 'search' => $search], ['class' => 'menu_pesquisa', 'id' => 'opc4']) ?>
            <?= Html::a('Artista', ['artista', 'search' => $search], ['class' => 'menu_pesquisa', 'id' => 'opc5']) ?>
    </div>

    <div class="col-sm-8" id="lista">

        <ul style="margin: 0; padding-left:0">
            <?php
                if($tipo == 'everything'){
                    if(sizeof($generoSearch)== 0 && sizeof($artistaSearch)== 0 && sizeof($albumSearch)== 0 &&sizeof($musicaSearch)== 0){
                        require ('nocontent.php');

                    }else{
                        if($generoSearch != null){ ?>
                            <div class="pesquisa_title">
                                <h3><span class="glyphicon glyphicon-list icon-title"></span>Género</h3>
                            </div>
                            <?php foreach ($generoSearch as $genero){
                                require ('genero.php');
                            }
                        }

                        if($artistaSearch != null){ ?>
                            <div class="pesquisa_title">
                                <h3><span class="glyphicon glyphicon-user icon-title"></span>Artista</h3>
                            </div>
                            <?php foreach ($artistaSearch as $artista){
                                require ('artista.php');
                            }
                        }
                        if($albumSearch != null){ ?>
                            <div class="pesquisa_title">
                                <h3><span class="glyphicon glyphicon-cd icon-title"></span>Album</h3>
                            </div>
                            <?php foreach ($albumSearch as $album){
                                require ('albuns.php');
                            }
                        }
                        if($musicaSearch != null){?>
                            <div class="pesquisa_title">
                                <h3><span class="glyphicon glyphicon-music icon-title"></span>Música</h3>
                            </div>
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

