<?php
use yii\helpers\Url;
?>

<li>
    <div class="objeto_genero-musica">
        <div id="imagem_artista-genero">
            <img src="<?= '..\\..\\common\\img\\capas'.'\\'.$genero->caminhoImagem?>">
        </div>
        <div class="info_body-genero">
            <h4 class="media-heading"><a href="<?= Url::toRoute(['detalhes/detalhesArtista', 'id' => $genero->id])?>"><?= $genero->nome?></a></h4>
        </div>
    </div>
</li>
