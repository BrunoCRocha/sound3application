<?php

use yii\helpers\Html;
?>



<div id="">
    <div id="">
        <img src="<?= $artista->caminhoImagem?>">
    </div>
    <div id="">
        <h3><?=$artista->nome?></h3>
        <h4><?= $artista->nacionalidade?></h4>
        <div id="imagem_favoritos">
            <?= Html::a('Seguir', ['index', 'id' => $album->id], ['class' => 'tooltiptext']) ?>
        </div>
    </div>

    <div>
        <ul>
            <?php
                foreach ($albunsArtista as $albuns){
                    require ('listaDetalhes_album.php');
                }
            ?>
        </ul>
    </div>


</div>