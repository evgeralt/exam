<?php

namespace frontend\controllers;

use frontend\components\stat\StatRepoInterface;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /** @var StatRepoInterface */
    private $repo;

    public function __construct($id, $module, StatRepoInterface $repo, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->repo = $repo;
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
        try {
            $this->repo->increment($id);
        } catch (\Throwable $exception) {
            return ['status' => 0];
        }

        return ['status' => 1];
    }
}
