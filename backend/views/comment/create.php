<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Comment */

$this->title = 'Criar Comentário';
$this->params['breadcrumbs'][] = ['label' => 'Álbuns', 'url' => ['album/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'listAlbum' => $listAlbum,
        'listUtilizador'=>$listUtilizador,
        'model' => $model
    ]) ?>

</div>
