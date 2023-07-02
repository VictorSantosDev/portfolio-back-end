<?php

namespace Modules\Authentication\Infrastructure\Repository;

use App\Data\DateTime\CreatedAt;
use App\Data\DateTime\UpdatedAt;
use App\Data\DateTime\DeletedAt;
use Modules\Authentication\Domain\Entity\TokenIntegrator;
use Modules\Authentication\Entities\TokenIntegrator as TokenIntegratorModel;
use Modules\Authentication\Domain\Infrastructure\Repository\InterfaceTokenIntegratorRepository;

class TokenIntegratorRepository implements InterfaceTokenIntegratorRepository
{
    private TokenIntegratorModel $model;

    public function __construct()
    {
        $this->model = new TokenIntegratorModel();
    }

    public function findToken(string $token): TokenIntegrator
    {
        $entity = $this->model::where('token', $token)->get()->first();

        return new TokenIntegrator(
            $entity->id,
            $entity->name,
            $entity->token,
            $entity->created_at ? new CreatedAt($entity->created_at) : null,
            $entity->updated_at ? new UpdatedAt($entity->updated_at) : null,
            $entity->deleted_at ? new DeletedAt($entity->deleted_at) : null
        );
    }
}
