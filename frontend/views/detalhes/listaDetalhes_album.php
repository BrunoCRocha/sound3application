<?php
use yii\helpers\Url;

?>

        <?= '<div class="col-md-2 caixa-nome-album">'?>
            <a href="<?= Url::toRoute(['detalhes/album', 'id' => $album->id])?>"><img class="image-artista  img-responsive" src="<?='..\\..\\common\\img\\capas\\'. $album->caminhoImagem?>"></a>
            <a href="<?= Url::toRoute(['detalhes/album', 'id' => $album->id])?>"><h3><?=$album->nome?></h3></a>
        </div>


