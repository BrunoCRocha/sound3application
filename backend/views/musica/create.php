<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Musica */

$this->title = 'Criar Música';
$this->params['breadcrumbs'][] = ['label' => 'Músicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="musica-create">

    <h1><?= Html::encode($this->title) ?></h1>
        <div class="fundo-form" >
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>

</div>
