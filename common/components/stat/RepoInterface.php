<?php

namespace common\components\stat;

interface RepoInterface
{
    public function increment(string $countryCode);

    public function getAll(): array;
}
