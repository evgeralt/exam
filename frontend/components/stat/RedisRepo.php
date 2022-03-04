<?php

namespace frontend\components\stat;

use yii\redis\Connection;

class RedisRepo
{
    public const STAT_COUNTRIES = 'statCountries';
    /** @var Connection */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function increment(string $countryCode)
    {
        $this->connection->hincrby(self::STAT_COUNTRIES, $countryCode, 1);
    }

    public function getAll(): array
    {
        return array_combine(
            $this->connection->hkeys(self::STAT_COUNTRIES),
            $this->connection->hvals(self::STAT_COUNTRIES)
        );
    }
}
