<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CompraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Favoritos';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-index">


    <h1><?= 'Favoritos' ?></h1>

    <p>
        <?= Html::a('Géneros', ['favoritos/showgenero', 'idUtilizador' => $idUtilizador], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Artistas', ['favoritos/showartista', 'idUtilizador' => $idUtilizador],['class' => 'btn btn-info']) ?>
        <?= Html::a('Álbuns', ['favoritos/showalbum', 'idUtilizador' => $idUtilizador], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Músicas', ['favoritos/showmusica', 'idUtilizador' => $idUtilizador], ['class' => 'btn btn-info']) ?>
    </p>

    <div class="fundo-form">
        <?php if($tipo == 'genero'){?>
        <?= $this->render('gridgenero', [
                'idUtilizador' =>$idUtilizador,
                'dataProvider' => $dataProvider,
        ]); }?>

        <?php if($tipo == 'artista'){?>
            <?= $this->render('gridartista', [
                'idUtilizador' =>$idUtilizador,
                'dataProvider' => $dataProvider,
            ]); }?>

        <?php if($tipo == 'album'){?>
            <?= $this->render('gridalbum', [
                'idUtilizador' =>$idUtilizador,
                'dataProvider' => $dataProvider,
            ]); }?>

        <?php if($tipo == 'musica'){?>
            <?= $this->render('gridmusica', [
                'idUtilizador' =>$idUtilizador,
                'dataProvider' => $dataProvider,
            ]); }?>
    </div>







</div>
