<?php

use yii\helpers\Url;
use yii\helpers\Html;


?>

<div id="album">
    <div id="imagem_album">
        <a href="<?= Url::toRoute(['detalhes/album', 'id' => $album->id])?>"><?= Html::img(Yii::getAlias($album->caminhoImagem))?></a>
        <img src="<?= $album->caminhoImagem?>">
    </div>
    <div id="album_body">
        <a href="<?= Url::toRoute(['detalhes/album', 'id' => $album->id])?>"><h3><?=$album->nome?> - <?= $album->artista->nome?></h3></a>
        <a href="<?= Url::toRoute(['pesquisa/detalhesAlbum', 'id' => $album->id])?>"><h5><?= 'nada' ?></h5></a>
        <div id="buttons_album_seguir">
            <p>
                <?= Html::a('Adde Favoritos', ['favoritos/album','id' =>$album->id], ['onclick'=>"$.ajax({
                                                                            type:'POST',
                                                                            url:'favoritos/album',
                                                                            success:function(response) {
                                                                                $('#close').html(response);
                                                                            }
                                                                        });return false;",
                    ]);

                //www.yiiframework.com/wiki/388/ajax-form-submiting-in-yii
                ?>

                <?= Html::a('Add Favoritos', ['index', 'id' => $album->id], ['class' => 'butao_opcoes']) ?>
                <?= Html::a('Add Varrinho', ['index', 'id' => $album->id], ['class' => 'butao_opcoes']) ?>
                <!--<button class="butao_opcoes">Add Favoritos</button>
                <button class="butao_opcoes">Add Carrinho</button>-->
            </p>
        </div>
    </div>
</div>
