<?php

namespace frontend\controllers;

use frontend\components\stat\RedisRepo;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /** @var RedisRepo */
    private $repo;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->repo = new RedisRepo(\Yii::$app->redis);
    }

    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->repo->getAll();
    }

    public function actionVisit(string $id)
    {
        $this->repo->increment($id);

        return ['status' => 1];
    }
}
