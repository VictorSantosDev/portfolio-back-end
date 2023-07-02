<?php

namespace Modules\Authentication\Domain\Entity;

use App\Data\DateTime\CreatedAt;
use App\Data\DateTime\UpdatedAt;

class SecretAuthorization
{
    public function __construct(
        private ?int $id,
        private string $secret,
        private int $active,
        private ?CreatedAt $createdAt,
        private ?UpdatedAt $updatedAt,
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSecret(): string
    {
        return $this->secret;
    }

    public function getActive(): int
    {
        return $this->active;
    }

    public function getCreatedAt(): ?CreatedAt
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?UpdatedAt
    {
        return $this->updatedAt;
    }
}
