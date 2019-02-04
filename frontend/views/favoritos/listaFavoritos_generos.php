<?php use yii\helpers\Url;?>
<li>
    <div class="objeto_genero-musica">
        <div id="imagem_artista-genero">
            <img src="<?=Yii::getAlias('@generosF').'/'.$genero->caminhoImagem?>">
        </div>
        <div class="info_body-genero">
            <h4 class="media-heading"><?= $genero->nome?></h4>
    </div>
    <div id="imagem_favoritos_sozinha">
        <a href="<?= Url::toRoute(['favoritos/rem-fav-genero', 'id' => $genero->id])?>">
            <img src="<?=Yii::getAlias('@menuiconsF').'/'?>rem-fav.svg">
        </a>
    </div>

    </div>
</li>