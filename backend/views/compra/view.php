<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Compra */

$this->title = "Id da Compra: ".$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['vercompra' , 'id' => $model->id_utilizador]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="fundo-form">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'data_compra',
                'valor_total',
                ['label'=>'Utilizador',
                    'attribute' => 'id_utilizador',
                    'value' => $model->utilizador->username,
                ],

            ],
        ]) ?>
    </div>

    <div class="form_compras">
    <h2>Músicas Compradas</h2>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID Música</th>
                <th>Nome</th>
                <th>Artista</th>
                <th>Álbum</th>
                <th>Preço</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $linhasCompra = $model->linhaCompras;
            foreach($linhasCompra as $linha){
                ?>
                <tr>

                    <?php
                    echo '<td>'.$linha->musica->id.'</td>';
                    echo '<td>'.$linha->musica->nome.'</td>';
                    echo '<td>'.$linha->musica->album->artista->nome.'</td>';
                    echo '<td>'.$linha->musica->album->nome.'</td>';
                    echo '<td>'.$linha->musica->preco.'</td>';
                    ?>

                </tr>
            <?php }
            ?>
            </tbody>
        </table>
    </div>

</div>
