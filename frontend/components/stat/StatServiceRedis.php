<?php

namespace frontend\components\stat;

use yii\redis\Connection;

class StatServiceRedis implements StatServiceInterface
{
    private const STAT_COUNTRIES = 'statCountries';
    /** @var Connection */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getAll(): array
    {
        $stat = [];
        $key = null;
        foreach ($this->connection->hgetall(self::STAT_COUNTRIES) as $item) {
            if ($key) {
                $stat[$key] = $item;
                $key = null;
            } else {
                $key = $item;
            }
        }

        return $stat;
    }

    public function increment(string $countryCode): void
    {
        $this->connection->hincrby(self::STAT_COUNTRIES, $countryCode, 1);
    }
}
