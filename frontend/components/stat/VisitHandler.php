<?php

namespace frontend\components\stat;

class VisitHandler
{
    private $service;

    public function __construct(StatServiceInterface $service)
    {
        $this->service = $service;
    }

    public function increment(string $countryCode): void
    {
        $this->service->increment($countryCode);
    }
}
