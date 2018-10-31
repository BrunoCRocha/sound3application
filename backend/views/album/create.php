<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Album */

$this->title = 'Criar Álbum';
$this->params['breadcrumbs'][] = ['label' => 'Álbuns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="fundo-form">
        <?= $this->render('_form', array(
                'model' => $model,
                'listArtista' =>$listArtista,
                'listGenero' => $listGenero,
                'listSubGenero' =>$listSubGenero

                )
        ) ?>
    </div>


</div>
