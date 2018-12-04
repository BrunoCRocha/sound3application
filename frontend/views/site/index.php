<?php

/* @var $this yii\web\View */


use yii\helpers\Html;


?>
<div class="site-index" id="display">

    <div class="body-content" >

            <div class="row" id="caixa_conteudo">
                <div class="col-sm-9" id="fds">
                    <h2 class="rowTitle">Fire</h2>
                    <div class="row">
                        <?php foreach ($arrayMusicas as $musica) {?>
                            <div class="col-4 col-sm-2">
                                <div id="caixa_conteudo">
                                    <img src="<?= $musica->album->caminhoImagem ?>" class="rounded imagem mx-auto d-block">
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
