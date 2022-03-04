<?php
return [
    'id' => 'exam',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'redis' => [
            'class' => \yii\redis\Connection::class,
            'hostname' => 'redis',
            'port' => 6379,
            'database' => 0,
        ],
        'urlManager' => [
            'class' => \yii\web\UrlManager::class,
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => [
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
    ],
];
