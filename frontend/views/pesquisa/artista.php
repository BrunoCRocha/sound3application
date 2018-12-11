<?php
use yii\helpers\Url;
use yii\helpers\Html;

foreach($favoritosPesquisados as $favoritoPesquisado) {
    if ($artista->id == $favoritoPesquisado->id) {
        $textbtn = 'Unfollow';
    } else {
        $textbtn = 'Follow';
    }
}

?>

<li>
    <div class="objeto_genero-musica" >
        <div id="imagem_artista-genero">
            <img src="<?= '..\\..\\common\\img\\capas'.'\\'.$artista->caminhoImagem?>">
        </div>
        <div class="info_body-artista">
            <h4 class="media-heading"><a href="<?= Url::toRoute(['pesquisa/detalhesAlbum', 'id' => $artista->id])?>"><?=$artista->nome?></a></h4>
            <h5><a href="<?= Url::toRoute(['pesquisa/detalhesAlbum', 'id' => $artista->id])?>"><?= '5 albuns '?></h5></a>
        </div>
        <div id="imagem_favoritos">
            <?= Html::a($textbtn, ['favoritos/artista', 'id' => $artista->id], ['class'=>'btn btn-success']) ?>
        </div>
    </div>
    <hr class="separador">

</li>
