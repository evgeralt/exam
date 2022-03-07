<?php

namespace frontend\controllers;

use frontend\components\stat\StatReader;
use frontend\components\stat\VisitHandler;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /** @var StatReader */
    private $reader;
    /** @var VisitHandler */
    private $visitHandler;

    public function __construct($id, $module, StatReader $reader, VisitHandler $visitHandler, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->reader = $reader;
        $this->visitHandler = $visitHandler;
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
        return $this->reader->getAll();
    }

    public function actionVisit(string $id)
    {
        try {
            $this->visitHandler->increment($id);
        } catch (\Throwable $exception) {
            return ['status' => 0];
        }

        return ['status' => 1];
    }
}
