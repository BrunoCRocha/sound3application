<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link rel="stylesheet" href="../web/ficheiros_css/home.css">
    <link rel="stylesheet" href="../web/ficheiros_css/album.css">
    <link rel="stylesheet" href="../web/ficheiros_css/pesquisa.css">
    <link rel="stylesheet" href="../web/ficheiros_css/carrinho.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript" src="../web/ficheiros_js/pesquisa.js"></script>

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
        $menuItems[] = ['label' => 'Favoritos', 'url' => ['/comment/favoritos']];
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



    echo '<form action="pesquisa/index">

        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
        </div>';




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

<footer class="footer" id="id_footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
