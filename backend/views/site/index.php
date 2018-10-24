<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="jumbotron">
    <?php echo '<h2> Bem-Vindo, ' . Yii::$app->user->identity->username .'</h2>'  ?>
</div>
<div class="site-index" id="bo-fundo">


    <div class="container-fluid" id="bo-container">
        <h3>Selecione a tabela a gerir:</h3>
        <div class="row">
            <div class="col-md-4">
                <a href="./index.php?r=user%2Findex">
                    <div class="bo-botao">
                        <h2 class="texto-botao">Users</h2>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="./index.php?r=artista%2Findex">
                    <div class="bo-botao" >
                        <h2 class="texto-botao">Artista</h2>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="./index.php?r=album%2Findex">
                    <div class="bo-botao">
                        <h2 class="texto-botao">Álbum</h2>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <a href="./index.php?r=musica%2Findex">
                    <div class="bo-botao">
                        <h2 class="texto-botao">Música</h2>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="./index.php?r=genero%2Findex">
                    <div class="bo-botao">
                        <h2 class="texto-botao">Género</h2>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="../../frontend/web/index.php?r=site%2Findex">
                    <div class="bo-botao">
                        <h2 class="texto-botao">FrontOffice</h2>
                    </div>
                </a>
            </div>
        </div>
        <br>
    </div>
</div>
