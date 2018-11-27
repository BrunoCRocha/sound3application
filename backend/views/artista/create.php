<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Artista */

$this->title = 'Criar Artista';
$this->params['breadcrumbs'][] = ['label' => 'Artistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artista-create" >

    <h1><?= Html::encode($this->title) ?></h1>

        <div>
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>


</div>
