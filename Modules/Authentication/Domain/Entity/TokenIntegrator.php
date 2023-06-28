<?php

namespace Modules\Authentication\Domain\Entity;

class TokenIntegrator
{
    public function __construct(
        private int $id,
        private string $name,
        private string $token,
        private ?string $created_at,
        private ?string $updated_at,
        private ?string $deleted_at,
    ) {
    }

    public function getId(): int
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
    
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }
    
    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }
    
    public function getDeletedAt(): ?string
    {
        return $this->deleted_at;
    }
}
