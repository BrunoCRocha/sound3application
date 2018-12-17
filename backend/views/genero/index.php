<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GeneroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Géneros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genero-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);
    if(Yii::$app->user->can('createGenero')){
        ?><p>
        <?= Html::a('Criar Género', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php }?>

    <?= Html::a('Criar Género', ['create'], ['class' => 'btn btn-success']) ?>
     <p></p>
    <div class="fundo-form">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'nome',
                ['label' => 'Descrição',
                    'attribute' => 'descricao'],

                ['class' => 'yii\grid\ActionColumn',
                    'header'=>"Ações",
                    'headerOptions' => [
                        'style' => 'color:#3277b3'
                    ],
                ],
            ],
        ]); ?>
    </div>

</div>
