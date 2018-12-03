<?php
use yii\helpers\Url;
use yii\helpers\Html;

?>

<li>
    <div id="album">
        <div id="imagem_album">
            <a href="<?= Url::toRoute(['detalhes/album', 'id' => $album->id])?>"><img src="<?= $album->caminhoImagem?>"></a>
        </div>
        <div id="album_body">
            <a href="<?= Url::toRoute(['detalhes/album', 'id' => $album->id])?>"><h3><?=$album->nome?> - <?= $album->artista->nome?></h3></a>
            <a href="<?= Url::toRoute(['pesquisa/detalhesAlbum', 'id' => $album->id])?>"><h5><?= 'nada' ?></h5></a>
            <div id="buttons_album_seguir">
                <p>
                    <?= Html::a('Add Favoritos', ['index', 'id' => $album->id], ['class' => 'butao_opcoes']) ?>
                    <?= Html::a('Add Varrinho', ['index', 'id' => $album->id], ['class' => 'butao_opcoes']) ?>
                    <!--<button class="butao_opcoes">Add Favoritos</button>
                    <button class="butao_opcoes">Add Carrinho</button>-->
                </p>
            </div>
        </div>
    </div>
</li>
