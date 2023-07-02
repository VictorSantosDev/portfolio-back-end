<?php

namespace Modules\Authentication\Domain\Infrastructure\Repository;

use Illuminate\Support\Collection;

interface InterfaceSecretAuthorizationRepository
{
    public function getAll(): Collection;
}