<?php

namespace common\components\stat;

use yii\web\UnprocessableEntityHttpException;

class Stat extends \yii\base\Component
{
    /** @var string|RepoInterface */
    public $repo = CacheRepo::class;
    public $allowedCountries = [
        'ru',
        'cy',
        'by',
        'us',
    ];

    public function init()
    {
        parent::init();

        $this->repo = \Yii::createObject($this->repo);
    }

    public function increment(string $countryCode): void
    {
        if (!in_array($countryCode, $this->allowedCountries, true)) {
            throw new UnprocessableEntityHttpException('Unknown country code');
        }

        $this->repo->increment($countryCode);
    }

    public function getStat(): array
    {
        return $this->repo->getAll();
    }
}
