<?php

use yii\helpers\Html;

    foreach($artistas as $artista){
        ?>
        <p><?=$artista->nome?><span><?= Html::a('Apagar', ['artista/delete' , 'id'=>$artista->id], ['class' => 'btn btn-sucess']) ?> </span></p>

        <?php
    }
?>