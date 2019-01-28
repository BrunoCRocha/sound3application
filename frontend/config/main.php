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
        'mailer' =>
            [
                'class' => 'yii\swiftmailer\Mailer',
                'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'smtp.gmail.com', //Se falhar usar ip v4…
                    'username' => 'sound3online@gmail.com',
                    'password' => 'edsheran',
                    'port' => '465', //465 ou 587',
                    'encryption' => 'ssl', //ssl ou tls
                ],
                'viewPath' => '@app/mail',
            ],
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
                        'GET checkout' => 'checkout'
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/album',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET topalbuns' => 'topalbuns',
                        'GET albunsrecentes' => 'albunsrecentes',                    
                        'GET findalbumbyid' => 'findalbumbyid',
                        'GET findmusicas' => 'findmusicas',
                        'GET artistaalbum' => 'artistaalbum',
                        'GET findalbumbysearch' => 'findalbumbysearch',
                        'GET albunsartista' => 'albunsartista',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/artista',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET albunsartista' => 'albunsartista',
                        'GET findartistabyid' => 'findartistabyid',
                        'GET findartistabysearch' => 'findartistabysearch',
                        'GET artistasrandom' => 'artistasrandom',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/genero',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET totalalbuns' => 'totalalbuns',
                        'GET findgenerobyid' => 'findgenerobyid',
                        'GET findalbunsgenero' => 'findalbunsgenero',
                        'GET findgenerobysearch' => 'findgenerobysearch',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/musica',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET top5musicas' => 'top5musicas',
                        'GET findmusicabyid' => 'findmusicabyid',
                        'GET findmusicabysearch' => 'findmusicabysearch',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/favgenero',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET getallgenerosfavoritos' => 'getallgenerosfavoritos',
                        'GET getgenerosfavoritos' => 'getgenerosfavoritos',
                        'GET findfavoritogenero' => 'findfavgenero',
                        'POST criarfavoritogenero' => 'criarfavoritogenero',
                        'DELETE apagarfavoritogenero' => 'apagarfavgenero',
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/favartista',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET getallartistasfavoritos' => 'getallartistasfavoritos',
                        'GET getartistasfavoritos' => 'getartistasfavoritos',
                        'GET findfavartista' => 'findfavartista',
                        'POST criarfavoritoartista' => 'criarfavoritoartista',
                        'DELETE apagarfavartista' => 'apagarfavartista'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/favalbum',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET findfavalbum' => 'findfavalbum',
                        'GET findfavmusica' => 'findfavmusica',
                        'POST criarfavoritoalbum' => 'criarfavoritoalbum',
                        'GET getallalbunsfavoritos' => 'getallalbunsfavoritos',
                        'GET getalbunsfavoritos' => 'getalbunsfavoritos',
                        'DELETE apagarfavalbum' => 'apagarfavalbum',
                    ],

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/favmusica',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET getallmusicasfavoritos' => 'getallmusicasfavoritos',
                        'GET getmusicasfavoritos' => 'getmusicasfavoritos',
                        'POST adicionarmusicafavoritos' => 'adicionarmusicafavoritos',
                        'GET checkmusicasalbumfavoritos' => 'checkmusicasalbumfavoritos',
                        'DELETE apagar-favorito-musica' => 'apagar-favorito-musica'
                    ]
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
                    'extraPatterns' => [
                        'GET getcomprasregistadas' => 'getcomprasregistadas',
                        'GET adicionar' => 'adicionar',
                        'GET adicionaralbum' => 'adicionaralbum',
                        'GET musicascompradas' => 'musicascompradas',
                        'GET comprauser' => 'comprauser',
                        'GET compras' => 'compras',
                        'GET getcarrinho' => 'getcarrinho',
                        'POST adicionarmusicacarrinho' => 'adicionarmusicacarrinho',
                        'POST adicionaralbum' => 'adicionaralbum',
                        'DELETE remover' => 'remover',
                        'GET checkalbumcarrinho' => 'checkalbumcarrinho',
                        'GET checkmusicacarrinho' => 'checkmusicacarrinho',
                        'GET checkmusicasalbumcarrinho' => 'checkmusicasalbumcarrinho',
                        'DELETE removealbumcarrinho' => 'removealbumcarrinho',
                        'GET checkmusicasalbumfavoritos' => 'checkmusicasalbumfavoritos',
                        'GET getmusicascompradas' => 'getmusicascompradas'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/comment',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET getallcomments' => 'getallcomments',
                        'POST criarcomment' => 'criarcomment',
                        'DELETE removecomment' => 'removecomment'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/pesquisa',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET pesquisaalbuns' => 'pesquisaalbuns',
                        'GET pesquisageneros' => 'pesquisageneros',
                        'GET pesquisaartistas' => 'pesquisaartistas',
                        'GET pesquisamusicas' => 'pesquisamusicas',
                    ]
                ],
            ]
        ],
        'urlManagerBackEnd' => [
            'class' => 'yii\web\UrlManager',
            'hostInfo' => 'http://localhost/sound3application/backend',
            'baseUrl' => 'http://localhost/sound3application/backend',
            'enablePrettyUrl' => false,
            'showScriptName' => false,
        ]
    ],


    'params' => $params,
];
