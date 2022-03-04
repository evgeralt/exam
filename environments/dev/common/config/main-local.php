<?php

return [
    'components' => [
        'cache' => [
            'class' => 'yii\redis\Cache',
            'redis' => [
                'hostname' => 'redis',
                'port' => 6379,
                'database' => 0,
            ],
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'redis',
            'port' => 6379,
            'database' => 0,
        ],
    ],
];
