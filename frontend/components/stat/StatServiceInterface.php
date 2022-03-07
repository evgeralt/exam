<?php

namespace frontend\components\stat;

interface StatServiceInterface
{
    public function getAll(): array;

    public function increment(string $countryCode): void;
}
