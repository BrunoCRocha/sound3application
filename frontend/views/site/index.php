<?php

/* @var $this yii\web\View */


use yii\bootstrap\Carousel;
use yii\helpers\Html;


?>
<div class="site-index" id="display">

    <div class="body-content" >

            <div class="row" id="caixa_conteudo">
                <div class="col-sm-9" id="fds">
                    <h2 class="rowTitle">Fire</h2>
                    <div class="row">
                        <?php echo Carousel::widget([
                            'items' => [
                                    foreach ($arrayMusicas as $musica) {?>
                                    <?php 'content'?> => '<img src="<?= "..\\..\\common\\img\\capas".'\\'.$musica->album->caminhoImagem ?>" class="rounded imagem mx-auto d-block">';
                                    <?php 'caption'?> => '<h4><?= $musica->album->nome?></h4><p><?= $musica->album->artista->nome?></p>'



                                    }



                            ])?>

                    </div>
                </div>
            </div>

    </div>
</div>
