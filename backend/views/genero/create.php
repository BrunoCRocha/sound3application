<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Genero */

$this->title = 'Criar Género';
$this->params['breadcrumbs'][] = ['label' => 'Géneros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genero-create">

    <h1><?= Html::encode($this->title) ?></h1>
        <div class="fundo-form" >
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>

</div>
