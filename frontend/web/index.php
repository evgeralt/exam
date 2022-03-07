<?php

error_reporting(E_ALL);

require(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');

(new yii\web\Application(require(__DIR__ . '/../config/main.php')))->run();
