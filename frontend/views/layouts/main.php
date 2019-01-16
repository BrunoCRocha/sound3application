<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <link rel="stylesheet" href="<?=Yii::getAlias('@csshome')?>">
    <link rel="stylesheet" href="<?=Yii::getAlias('@csspesquisa')?>">
    <link rel="stylesheet" href="<?=Yii::getAlias('@csscarrinho')?>">
    <link rel="stylesheet" href="<?=Yii::getAlias('@cssperfil')?>">
    <link rel="stylesheet" href="<?=Yii::getAlias('@cssdetalhes')?>">
    <link rel="stylesheet" href="<?=Yii::getAlias('@cssfavoritos')?>">
    <link rel="stylesheet" href="<?=Yii::getAlias('@cssalbum')?>">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript" src="/sound3application/frontend/web/ficheiros_js/pesquisa.js"></script>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script>
        jQuery(document).ready(function($) {
            $('.resume') .hide()
            $('a[href^="#"]').on('click', function() {
                $('.resume') .hide()
                var target = $(this).attr('href');
                $('.resume'+target).toggle();
            });
        });
    </script>
    <!-- searchbar autocompleter-->
    <script>
        $(document).ready(function() {
            $('input.search').typeahead({
                name: 'search',
                remote: 'autocompleter.php?query=%QUERY'
            });
        })
    </script>

</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => "Sound3",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => 'Favoritos', 'url' => ['/favoritos/index']];
        $menuItems[] = ['label' => 'Carrinho', 'url' => ['/carrinho/index']];
        $menuItems[] = ['label' => Yii::$app->user->identity->username,
            'items' => [
                ['label' => 'Perfil', 'url' => ['/perfil/index', 'id' =>Yii::$app->user->identity->getId()]],
                '<li class="divider"></li>',
                ['label'=>'Logout','url'=>['/site/logout'],
                    'linkOptions' =>['data-method' => 'post']
                ]
            ]
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);


    echo'<div class="searchbar-parent">';
    ActiveForm::begin(['method' => 'get',
    'action' => ['pesquisa/index']]);

    echo '<div class="input-group searchbar">
            <input type="text" class="form-control" name="search" placeholder="Procure músicas, álbuns, artistas ou géneros">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit" name="buttonSearch">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
        </div>';
    ActiveForm::end();
    echo '</div>';
    NavBar::end();

    ?>

    <div class="container" id="container_pagina">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!-- Footer -->
<footer class="footer font-small blue" style="background-color: grey;color:white">

    <!-- Copyright -->
    <div class="footer-copyright py-3" style="text-align: center;">
        <span style="display: inline-block;float:left;padding-left: 5%">2ºAno TeSP Programação de Sistemas de Informação</span>
        <span style="display: inline-block;">Bruno Rocha, Diogo Cruz e Márcia Ferreira</span>
        <span style="display: inline-block;float:right;padding-right: 5%">sound3online@gmail.com</span>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
