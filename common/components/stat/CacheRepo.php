<?php

namespace common\components\stat;

use yii\base\BaseObject;
use yii\base\Exception;
use yii\caching\CacheInterface;
use yii\di\Instance;
use yii\queue\ExecEvent;
use yii\queue\redis\Queue;

class CacheRepo extends BaseObject implements RepoInterface
{
    public const STAT_COUNTRIES = 'statCountries';
    /** @var CacheInterface */
    public $cache = 'cache';
    /** @var Queue */
    public $queue = 'queue';

    public function init()
    {
        parent::init();
        $this->cache = Instance::ensure($this->cache, CacheInterface::class);
        $this->queue = Instance::ensure($this->queue, Queue::class);
    }

    public function increment(string $countryCode)
    {
        $this->queue->push(new IncrementJob($this->cache, $countryCode));
    }

    public function getAll(): array
    {
        // Это можно (и нужно) унести в фоновый воркер, разместил здесь для наглядности
        $this->queue->on(Queue::EVENT_AFTER_ERROR, function (ExecEvent $event) {
            throw new Exception('Statistics collection error');
        });
        $this->queue->run(false);
        IncrementJob::commit($this->cache);

        return $this->cache->get(self::STAT_COUNTRIES) ?: [];
    }
}
