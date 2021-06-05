<?php

declare(strict_types=1);

namespace App\Application\services;

interface IdGenerator
{
    /**
     * @return string
     */
    public function nextIdentity(): string;
}
