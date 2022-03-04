<?php
return [
    'id' => 'exam',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'user' => [
            'identityClass' => \common\models\User::class,
        ],
        'cache' => [
            'class' => 'yii\redis\Cache',
            'redis' => [
                'hostname' => 'localhost',
                'port' => 6379,
                'database' => 0,
            ],
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '127.0.0.1',
            'port' => 6379,
            'database' => 0,
        ],
        'queue' => [
            'class' => '\yii\queue\redis\Queue',
            'redis' => 'redis',
            'channel' => 'queue',
        ],
        'stat' => [
            'class' => \common\components\stat\Stat::class,
        ],
    ],
];
