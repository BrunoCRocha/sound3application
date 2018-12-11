<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<li>
    <div class="objeto_genero-musica" >
        <div id="imagem_artista-genero">
            <img src="<?= '..\\..\\common\\img\\capas'.'\\'.$artista->caminhoImagem?>">
        </div>
        <div class="info_body-artista">
            <h4 class="media-heading"><a href="<?= Url::toRoute(['detalhes/artista', 'id' => $artista->id])?>"><?=$artista->nome?></a></h4>
            <h5><a href="<?= Url::toRoute(['detalhes/artista', 'id' => $artista->id])?>"><?= '5 albuns '?></h5></a>
        </div>
        <div id="imagem_favoritos">
            <?= Html::a('Seguir', ['index', 'id' => $artista->id]) ?>
        </div>
    </div>
    <hr class="separador">

</li>
