<?php

namespace Modules\Authentication\Domain\Infrastructure\Entity;

use Modules\Authentication\Domain\Entity\TokenIntegrator;

interface TokenIntegratorEntity
{
    public function save(TokenIntegrator $tokenIntegrator): TokenIntegrator;
}
