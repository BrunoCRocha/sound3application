<?php

use yii\helpers\Html;
?>



<div>
    <div class="col-md-3 col-sm-6 col-xs-12 caixa">
        <img class="image-artista" src="<?='..\\..\\common\\img\\capas\\'. $artista->caminhoImagem?>">

    </div>
    <div  class="col-md-8 col-sm-6 col-xs-12 caixa text_artista">
        <h3><?=$artista->nome?></h3>
        <h4><?= $artista->nacionalidade?></h4>
        <h4><?= 'Início de Carreira: '.$artista->ano?></h4>

    </div>
</div>
<hr>
<div>
    <div id="albunsArtista" >
        <ul style="margin: 0; padding-top: 250px">
            <?php
                foreach ($albunsArtista as $album){
                    require ('listaDetalhes_album.php');
                }
            ?>
        </ul>
    </div>


</div>