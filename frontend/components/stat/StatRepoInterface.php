<?php

namespace frontend\components\stat;

interface StatRepoInterface
{
    public function getAll(): array;

    public function increment(string $countryCode): void;
}
