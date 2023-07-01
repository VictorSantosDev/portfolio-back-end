<?php

namespace Modules\Authentication\Domain\Infrastructure\Repository;

interface InterfaceSecretAuthorizationRepository
{
    public function authentication(string $value);
}