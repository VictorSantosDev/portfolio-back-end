<?php

namespace Modules\Authentication\Infrastructure\Repository;

use Modules\Authentication\Entities\SecretAuthorization;
use Modules\Authentication\Domain\Infrastructure\Repository\InterfaceSecretAuthorizationRepository;

class SecretAuthorizationRepository
implements InterfaceSecretAuthorizationRepository
{
    private SecretAuthorization $model;

    public function __construct()
    {
        $this->model = new SecretAuthorization();
    }

    public function authentication(string $value)
    {
        dd($value);
        $entity = $this->model::where('token', $value);
        dd($entity);
    }
}