<?php
use yii\helpers\Url;
use yii\helpers\Html;

?>


<div class="row">
    <div id="albunsArtista" >


               <img class="image-responsive" src="<?='..\\..\\common\\img\\capas\\'. $album->caminhoImagem?>">
            <a href="<?= Url::toRoute(['detalhes/album', 'id' => $album->id])?>"><h3><?=$album->nome?></h3></a>
            <?= Html::a( 'nn',['detalhes/artista', 'id' => $album->id], ['class' => 'butao_opcoes glyphicon glyphicon-heart']) ?>
                    <?= Html::a( 'nn',['detalhes/artista', 'id' => $album->id], ['class' => 'butao_opcoes glyphicon glyphicon-shopping-cart']) ?>


    </div>


</div>
