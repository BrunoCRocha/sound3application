<?php
use yii\helpers\Url;
?>

<li>
    <div class="box-comment">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?= $comment->utilizador->username ?></strong>
                <span class="text-muted">comentou no dia <?= $comment->data_criacao ?></span>
                <?php
                    if(Yii::$app->user->identity->getId() == $comment->id_utilizador){?>
                        <span style="float: right"><a href="<?= Url::toRoute(['comment/update', 'id' => $comment->id])?>">Editar </a> | <a href="<?= Url::toRoute(['comment/delete', 'id' => $comment->id])?>">Remover</a></span>
                   <?php }
                ?>

            </div>
            <div class="panel-body">
                <?= $comment->conteudo ?>
            </div><!-- /panel-body -->
        </div><!-- /panel panel-default -->
    </div>
</li>
