<?php

namespace common\components\stat;

use yii\caching\CacheInterface;
use yii\queue\JobInterface;

class IncrementJob implements JobInterface
{
    private $cache;
    private $countryCode;
    private static $runtimeStat;

    public function __construct(CacheInterface $cache, string $countryCode)
    {
        $this->cache = $cache;
        $this->countryCode = $countryCode;
    }

    public function execute($queue)
    {
        self::$runtimeStat = self::$runtimeStat ?? $this->cache->get(CacheRepo::STAT_COUNTRIES) ?: [];
        $counter = self::$runtimeStat[$this->countryCode] ?? 0;
        self::$runtimeStat[$this->countryCode] = ++$counter;
    }

    public static function commit(CacheInterface $cache)
    {
        $cache->set(CacheRepo::STAT_COUNTRIES, self::$runtimeStat);
    }
}
