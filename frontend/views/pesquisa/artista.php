<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div id="artista">
    <div id="artista_imagem">
        <a href="<?= Url::toRoute([pesquisa/detalhesAlbum, 'id' => $artista->id])?>"><img src="<?= $artista->caminhoImagem?>"></a>
    </div>
    <div id="artista_body">
        <a href="<?= Url::toRoute([pesquisa/detalhesAlbum, 'id' => $artista->id])?>"><h3><?=$artista->nome?></h3></a>
        <a href="<?= Url::toRoute([pesquisa/detalhesAlbum, 'id' => $artista->id])?>"><h5><?= 'numero albuns '?></h5></a>
        <div id="imagem_favoritos">
            <?= Html::a('Seguir', ['index', 'id' => $album->id], ['class' => 'tooltiptext']) ?>
            <!--<button></button>
            <span class="tooltiptext">Seguir</span>-->
        </div>
    </div>
</div>
