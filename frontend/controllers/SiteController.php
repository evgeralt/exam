<?php

namespace frontend\controllers;

use yii\rest\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return [
            'test' => 123
        ];
    }
}
