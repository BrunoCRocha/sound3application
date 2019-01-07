<?php

/* @var $this yii\web\View */


use yii\bootstrap\Button;
use yii\bootstrap\Carousel;
use yii\helpers\Html;
use common\models\Album;
use yii\helpers\Url;

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
                    $i = 1;
                    foreach ($arrayMusicas as $musica) {
                        if($count<5){
                            $count++;
                            ?>
                            <div class="col-md-2 caixa_conteudo"><a  id=img href="<?= Url::toRoute(['detalhes/album', 'id' => $musica->album->id])?>">
                                    <img class="image-responsive"
                                         src="<?=Yii::getAlias('@albunsF').'/'.$musica->album->caminhoImagem ?>"/></a>
                                    <a class="nomeMusica<?=$i++?>" href="<?= Url::toRoute(['detalhes/album', 'id' => $musica->album->id])?>">
                                        <h2><?=$musica->nome?></h2></a>

                                    <a  id=nomeArtista href="<?= Url::toRoute(['detalhes/artista', 'id' => $musica->album->artista->id])?>">
                                        <h3><?=$musica->album->artista->nome?></h3></a>
                            </div>
                            <?php
                              /* echo Button::Widget([
                                    'label'=>'label',
                                    'options'=>['style' => 'background: url('.Yii::getAlias('@albunsF').'/'.$musica->album->caminhoImagem.')'],
                                    'url' => Url::toRoute(['detalhes/album', 'id' => $musica->album->id])
                                ]);*/
                            ?>
                       <?php }
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
                        ?><div class="col-md-2 caixa_conteudo conteudo_artista"><a href="<?= Url::toRoute(['detalhes/artista', 'id' => $musica->album->artista->id])?>">
                        <img class="rounded"
                                         src="<?=Yii::getAlias('@artistasF').'/'.$musica->album->artista->caminhoImagem ?>"/>
                                         <div class="overlay">
                                            <div class="text"><h2><?=$musica->album->artista->nome?></h2></a></div>
                                         </div>
                                         
                                      </div>
                    <?php } $count=0;
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
                        ?><div class="col-md-2 caixa_conteudo">
                        <a href="<?= Url::toRoute(['detalhes/album', 'id' => $musica->album->id])?>">
                                        <img class="image-responsive" src="<?=Yii::getAlias('@albunsF').'/'.$musica->album->caminhoImagem ?>"/>
                                    </a>
                                    <a href="<?= Url::toRoute(['detalhes/album', 'id' => $musica->album->id])?>">
                                        <h2><?=$musica->album->nome?></h2>
                                    </a>

                                    <a href="<?= Url::toRoute(['detalhes/artista', 'id' => $musica->album->artista->id])?>">
                                        <h3 name="nomeArtista-text"><?=$musica->album->artista->nome?></h3>
                                    </a>
                                  </div>
                    <?php }
                }$count=0?>
            </div>
        </div>
    </div>



</div>