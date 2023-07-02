<?php

namespace Modules\Authentication\Domain\Infrastructure\Repository;

use Modules\Authentication\Domain\Entity\TokenIntegrator;

interface InterfaceTokenIntegratorRepository
{
    public function findToken(string $token): TokenIntegrator;
}
