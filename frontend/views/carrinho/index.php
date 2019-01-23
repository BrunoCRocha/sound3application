<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Carrinho';
?>
<div class="site-index">
    <div class="body-content" >
        <div class="row" style="width: 100%; height: auto;">
            <h2 style="color: white"> <span class="glyphicon glyphicon-shopping-cart" style="color:white;margin-left: 20px; padding-right: 20px">
                </span>Carrinho (<?= count($musicas)?>)</h2>
            <div class="col-sm-12" style="margin-top: 5%">

                <table class="table table-carrinho">
                    <thead>
                    <tr>
                        <th >Capa do Álbum</th>
                        <th style="">Nome</th>
                        <th >Nome do Artista</th>
                        <th >Nome do Álbum </th>
                        <th >Preço</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                        foreach ($musicas as $musica){?>
                            <tr>
                                <td id="td-img-album-cart">
                                    <div class="div-img-album-cart img-fluid">
                                        <img src="<?= Yii::getAlias('@albunsF').'/'.$musica->album->caminhoImagem?>">
                                    </div>

                                </td>
                                <td>
                                    <h4><?= $musica->nome ?></h4>
                                </td>

                                <td>
                                    <h4>
                                        <a href="<?= Url::toRoute(['detalhes/artista', 'id' => $musica->id])?>"><?= $musica->album->artista->nome ?></a>
                                    </h4>
                                </td>
                                <td>
                                    <h4>
                                        <a href="<?= Url::toRoute(['detalhes/album', 'id' => $musica->id])?>"><?= $musica->album->nome ?></a>
                                    </h4>
                                </td>
                                <td>
                                    <h4><?=$musica->preco?>€</h4>
                                </td>

                                <?php
                                if($musicasFavoritas!=null){
                                    //var_dump($musicasFavoritas);
                                    // die();
                                    if(in_array($musica->id,$musicasFavoritas)){
                                        $rota = 'rem-fav-musica';
                                        $textbtnfav = 'heart_white';
                                    } else{
                                        $rota = 'add-fav-musica';
                                        $textbtnfav = 'heart';
                                    }
                                }else{
                                    $rota = 'add-fav-musica';
                                    $textbtnfav = 'heart';
                                }
                                ?>
                                <td>
                                    <div id="imagem_favoritos" style="margin-top: 5px">
                                        <a href="<?= Url::toRoute(['favoritos/'.$rota, 'id' => $musica->id])?>">
                                            <img src="<?=Yii::getAlias('@menuiconsF').'/'.$textbtnfav?>.svg">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div id="imagem_carrinho" style="margin-top: 5px">
                                        <a href="<?= Url::toRoute(['carrinho/remover', 'id' => $musica->id])?>">
                                            <img src="<?=Yii::getAlias('@menuiconsF').'/'?>sub-cart.svg">
                                        </a>
                                    </div>
                                </td>

                                <hr class="separador">
                            </tr><?php
                        }
                    ?>
                </ul>
                    </tbody>
                </table>

                <span style=" float: right">
                    <h4 style="color: white;" >Valor total a pagar: <?= $valorTotal ?>€</h4>
                    <?php
                        if(count($musicas)==0){?>
                            <?= Html::Button('Proceder ao Pagamento', ['class' => 'btn btn-info', 'disabled' => true]) ?>
                        <?php }else{?>
                            <?= Html::a('Proceder ao Pagamento', ['pagamento/checkout'], ['class' => 'btn btn-primary']) ?>
                       <?php }
                    ?>

                </span>
            </div>

        </div>
    </div>
</div>
