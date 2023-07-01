<?php

namespace Modules\Authentication\Domain\Entity;

use App\Data\DateTime\CreatedAt;
use App\Data\DateTime\UpdatedAt;
use App\Data\DateTime\DeletedAt;

class TokenIntegrator implements \JsonSerializable
{
    public function __construct(
        private ?int $id,
        private string $name,
        private string $token,
        private ?CreatedAt $created_at,
        private ?UpdatedAt $updated_at,
        private ?DeletedAt $deleted_at,
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
    
    public function getToken(): string
    {
        return $this->token;
    }
    
    public function getCreatedAt(): ?CreatedAt
    {
        return $this->created_at;
    }
    
    public function getUpdatedAt(): ?UpdatedAt
    {
        return $this->updated_at;
    }
    
    public function getDeletedAt(): ?DeletedAt
    {
        return $this->deleted_at;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'token' => $this->getToken(),
            'createdAt' => $this->getCreatedAt()?->jsonSerialize(),
            'updatedAt' => $this->getUpdatedAt()?->jsonSerialize()
        ];
    }
}
