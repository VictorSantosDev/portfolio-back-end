<?php

namespace Modules\Authentication\Infrastructure\Repository;

use App\Data\DateTime\CreatedAt;
use App\Data\DateTime\UpdatedAt;
use Illuminate\Support\Collection;
use Modules\Authentication\Domain\Entity\SecretAuthorization;
use Modules\Authentication\Entities\SecretAuthorization as SecretAuthorizationModel;
use Modules\Authentication\Domain\Infrastructure\Repository\InterfaceSecretAuthorizationRepository;

class SecretAuthorizationRepository
implements InterfaceSecretAuthorizationRepository
{
    private SecretAuthorizationModel $model;

    public function __construct()
    {
        $this->model = new SecretAuthorizationModel();
    }

    public function getAll(): Collection
    {
        $entity = $this->model::where('active', '1')->get()->toArray();

        $items = [];
        foreach ($entity as $value) {

            $items[] = new SecretAuthorization(
                $value['id'],
                $value['secret'],
                $value['active'],
                is_null($value['created_at']) ? new CreatedAt($value['created_at']) : null,
                is_null($value['updated_at']) ? new UpdatedAt($value['updated_at']) : null
            );
        }

        return collect($items);
    }
}
