<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 30/11/2018
 * Time: 16:19
 */

use common\models\Album;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$catList = [
    2 => 'Books',
    3 => 'Home & Kitchen'
];
?>

<div class="compra-form">

    <?php $form = ActiveForm::begin();

    echo $form->field($dadosSemValorMusica, 'id_parent')->dropDownList($catList, ['prompt' => 'Selecione o Artista...', 'id'=>'cat-id']);

    /*var_dump($generos2    );
    var_dump(ArrayHelper::map(Album::find()
                    ->select(['id', 'nome'])
                    ->where(['id_genero' => 2])
                    ->all(),
                        'id',
                        'nome'));
    die();*/


    echo $form->field($dadosSemValorMusica, 'id_chave')->widget(DepDrop::classname(), [
        'options'=>['id'=>'subcat-id'],
        'pluginOptions'=>[
            'depends'=>['cat-id'],
            'placeholder'=>'Select...',
            'url'=>Url::to(['/teste/subcat'])
        ]
    ]);
    ActiveForm::end();
?>
</div>
