<?php

namespace Modules\Authentication\Infrastructure\Entity;

use App\Data\DateTime\CreatedAt;
use App\Data\DateTime\UpdatedAt;
use Modules\Authentication\Domain\Entity\TokenIntegrator;
use Modules\Authentication\Entities\TokenIntegrator as TokenIntegratorModel;
use Modules\Authentication\Domain\Infrastructure\Entity\InterfaceTokenIntegratorEntity;

class TokenIntegratorEntity
implements InterfaceTokenIntegratorEntity
{
    private TokenIntegratorModel $model;

    public function __construct()
    {
        $this->model = new TokenIntegratorModel();
    }

    public function save(TokenIntegrator $tokenIntegrator): TokenIntegrator
    {
        $entity = $this->model::create([
            'name' => $tokenIntegrator->getName(),
            'token' => $tokenIntegrator->getToken()
        ]);

        return new TokenIntegrator(
            $entity->id,
            $entity->name,
            $entity->token,
            new CreatedAt($entity->created_at),
            new UpdatedAt($entity->updated_at),
            null
        );
    }
}
