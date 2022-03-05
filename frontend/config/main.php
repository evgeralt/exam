<?php
return [
    'id' => 'exam',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
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
    'container' => [
        'singletons' => [
            \yii\redis\Connection::class => [
                'class' => \yii\redis\Connection::class,
                'hostname' => 'redis',
                'port' => 6379,
                'database' => 0,
            ],
        ],
        'definitions' => [
            \frontend\components\stat\StatRepoInterface::class => \frontend\components\stat\StatRepoRedis::class,
        ],
    ],
];
