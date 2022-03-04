<?php

namespace frontend\controllers;

use common\components\stat\Stat;
use yii\base\Exception;
use yii\rest\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        /** @var Stat $stat */
        $stat = \Yii::$app->stat;

        return $stat->getStat();
    }

    public function actionVisit(string $id)
    {
        /** @var Stat $stat */
        $stat = \Yii::$app->stat;
        $stat->increment($id);

        return ['status' => 1];
    }

    public function actionError()
    {
        throw new Exception();
    }
}
