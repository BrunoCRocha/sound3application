<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'api' => [
            'class' => 'frontend\modules\api\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'parsers' =>
                [
                    'application/json' => 'yii\web\JsonParser',
                ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/user',
                    'pluralize' => false,
                    'except' =>['delete'],
                    'extraPatterns' => [
                        'GET verificarlogin' => 'verificarlogin',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/album',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET findalbumbyid' => 'findalbumbyid',
                        'GET findmusicas' => 'findmusicas',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/artista',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET findartistabyid' => 'findartistabyid',
                        'GET albunsartista' => 'albunsartista',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/genero',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET totalalbuns' => 'totalalbuns',
                        'GET findgenerobyid' => 'findgenerobyid',
                        'GET findalbuns' => 'findalbuns',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/musica',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET findmusicabyid' => 'findmusicabyid',
                    ],

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/favgenero',
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/favartista',
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/favalbum',
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/favmusica',
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/linha-compra',
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/compra',
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/comment',
                    'pluralize' => false,
                ],
            ]
        ],

    ],


    'params' => $params,
];
