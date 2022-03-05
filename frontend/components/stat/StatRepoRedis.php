<?php

namespace frontend\components\stat;

use yii\base\BaseObject;
use yii\redis\Connection;

class StatRepoRedis extends BaseObject implements StatRepoInterface
{
    private const STAT_COUNTRIES = 'statCountries';
    /** @var Connection */
    private $connection;

    public function __construct(Connection $connection, $config = [])
    {
        parent::__construct($config);
        $this->connection = $connection;
    }

    public function getAll(): array
    {
        return array_combine(
            $this->connection->hkeys(self::STAT_COUNTRIES),
            $this->connection->hvals(self::STAT_COUNTRIES)
        );
    }

    public function increment(string $countryCode): void
    {
        $this->connection->hincrby(self::STAT_COUNTRIES, $countryCode, 1);
    }
}
