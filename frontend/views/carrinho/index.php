<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
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
                        <th >Nome</th>
                        <th >Nome do Artista</th>
                        <th >Nome do Álbum </th>
                        <th >Preço</th>
                        <th ></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                        foreach ($musicas as $musica){?>
                            <tr>
                                <td id="td-img-album-cart">
                                    <div class="div-img-album-cart img-fluid">
                                        <img src="<?= '..\\..\\common\\img\\capas'.'\\'.$musica->album->caminhoImagem?>">
                                    </div>

                                </td>
                                <td>
                                    <h4><?= $musica->nome ?></h4>
                                </td>

                                <td>
                                    <h4>
                                        <a href="<?= Url::toRoute(['detalhes/detalhesArtista', 'id' => $musica->id])?>"><?= $musica->album->artista->nome ?></a>
                                    </h4>
                                </td>
                                <td>
                                    <h4>
                                        <a href="<?= Url::toRoute(['detalhes/detalhesAlbum', 'id' => $musica->id])?>"><?= $musica->album->nome ?></a>
                                    </h4>
                                </td>
                                <td>
                                    <h4><?=$musica->preco?>€</h4>
                                </td>
                                <td>
                                    <div class="dropdown opc" style="margin: 0 auto">
                                        <button onclick="myFunction()" class="dropbtn opc-btn" style="margin: 0 auto"></button>
                                        <div id="myDropdown" class="dropdown-content">
                                            <a href="<?= Url::toRoute(['remover', 'id' => $musica->id])?>">Remover Carrinho</a>
                                            <a href="<?= Url::toRoute(['favoritos/adicionarMusica', 'id' => $musica->id])?>">Adicionar Favoritos</a>
                                        </div>
                                    </div>
                                </td>





                                <hr class="separador">
                            </tr><?php
                        }
                    ?>
                </ul>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
