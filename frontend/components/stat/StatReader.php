<?php

namespace frontend\components\stat;

class StatReader
{
    private $service;

    public function __construct(StatServiceInterface $service)
    {
        $this->service = $service;
    }

    public function getAll(): array
    {
        return $this->service->getAll();
    }
}
