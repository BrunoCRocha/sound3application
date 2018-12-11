<?php

/* @var $this yii\web\View */


use yii\bootstrap\Carousel;
use yii\helpers\Html;
use common\models\Album;
$count=0;
$this->registerJsFile(
    '@web/js/carousel.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);


/*foreach ($arrayMusicas as $musica) {
    '<img src="..\\..\\common\\img\\capas\\'.$musica->album->caminhoImagem .'" class="rounded imagem mx-auto d-block"/>';
    '<h2>'.$musica->nome.'</h2><h3>'.$musica->album->artista->nome.'</h3>';
}*/



?>
<div class="site-index">
    <div class="body-content" >
        <div class="row">
           <h2 style="color: white"> <span class="glyphicon glyphicon-fire" style="color:#cc0000;margin-left: 20px; padding-right: 20px"></span>Álbuns Populares</h2>
            <div class="box">
                <?php
                    foreach ($arrayMusicas as $musica) {
                        if($count<5){
                            $count++;
                            echo '<div class="col-md-2 col-sm-6 col-xs-12 caixa_conteudo"><a href="#">';
                            echo '<img class="image-responsive"
                                         src="..\\..\\common\\img\\capas\\'.$musica->album->caminhoImagem .'"/>
                                         <h2>'.$musica->album->nome.'</h2></a><a href="#"><h3>'.$musica->album->artista->nome.'</h3></a>
                                      </div>';
                        }
                    }?>


            </div>
        </div>
    </div>

</div>