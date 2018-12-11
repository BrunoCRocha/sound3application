<?php

/* @var $this yii\web\View */


use yii\bootstrap\Carousel;
use yii\helpers\Html;
$count=0;
$this->registerJsFile(
    '@web/js/textlimit.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);



?>
<div class="site-index">
    <div class="body-content" >
        <div class="row">
            <h2 style="color: white"> <span class="glyphicon glyphicon-fire" style="color:#cc0000;margin-left: 20px; padding-right: 20px"></span>Fire</h2>
            <div class="box">
                <?php
                    foreach ($arrayMusicas as $musica) {
                        if($count<5){
                            $count++;
                            echo '<div class="col-md-2 caixa_conteudo"><a href="#">';
                            echo '<img class="image-responsive"
                                         src="..\\..\\common\\img\\capas\\'.$musica->album->caminhoImagem .'"/>
                                         <h2>'.$musica->nome.'</h2></a><a href="#"><h3>'.$musica->album->artista->nome.'</h3></a>
                                      </div>';
                        }
                    }$count=0?>


            </div>
        </div>
        <hr>
        <div class="row">
            <h2 style="color: white"> <span class="glyphicon glyphicon-flash" style="color:#cc0000;margin-left: 20px; padding-right: 20px"></span>Artistas do Momento</h2>
            <div class="box">
                <?php
                foreach ($arrayMusicas as $musica) {
                    if($count<5){
                        $count++;
                        echo '<div class="col-md-2 caixa_conteudo conteudo_artista"><a href="#">';
                        echo '<img class="rounded"
                                         src="..\\..\\common\\img\\capas\\'.$musica->album->artista->caminhoImagem .'"/>
                                         <div class="overlay">
                                            <div class="text"><h2>'.$musica->album->artista->nome.'</h2></a></div>
                                         </div>
                                         
                                      </div>';
                    }$count=0;
                }?>
            </div>
        </div>
        <hr>
        <div class="row">
            <h2 style="color: white"> <span class="glyphicon glyphicon-cd" style="color:#cc0000;margin-left: 20px; padding-right: 20px"></span>TOP Álbuns</h2>
            <div class="box">
                <?php
                foreach ($arrayMusicas as $musica) {
                    if($count<5){
                        $count++;
                        echo '<div class="col-md-2 caixa_conteudo"><a href="#">';
                        echo '<img class="image-responsive"
                                         src="..\\..\\common\\img\\capas\\'.$musica->album->caminhoImagem .'"/>
                                         <h2>'.$musica->album->nome.'</h2></a><a href="#"><h3>'.$musica->album->artista->nome.'</h3></a>
                                      </div>';
                    }
                }$count=0?>
            </div>
        </div>
    </div>



</div>