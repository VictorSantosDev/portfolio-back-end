<?php

namespace Modules\Authentication\Domain\Service;

use App\Data\DateTime\CreatedAt;
use App\Data\DateTime\UpdatedAt;
use Modules\Authentication\Domain\Utils\GenerateHash;
use Modules\Authentication\Domain\Entity\TokenIntegrator;
use Modules\Authentication\Infrastructure\Entity\TokenIntegratorEntity;
use Modules\Authentication\Infrastructure\Repository\SecretAuthorizationRepository;
use Modules\Authentication\Domain\Infrastructure\Entity\InterfaceTokenIntegratorEntity;
use Modules\Authentication\Domain\Infrastructure\Repository\InterfaceSecretAuthorizationRepository;

class AuthenticationService
{
    private InterfaceTokenIntegratorEntity $tokenIntegratorEntity;

    private InterfaceSecretAuthorizationRepository $secretAuthorizationRepository;

    public function __construct(
        TokenIntegratorEntity $tokenIntegratorEntity,
        SecretAuthorizationRepository $secretAuthorizationRepository
    ) {
        $this->tokenIntegratorEntity = $tokenIntegratorEntity;
        $this->secretAuthorizationRepository = $secretAuthorizationRepository;
    }

    /** @param array<mixed> */
    public function auth(array $data): bool
    {
        $token = $data['token'];
        $secret = $data['secret'];

        $this->secretAuthorizationRepository->authentication(
            md5($secret) . env('KEY_AUTHORIZATION')
        );

        return true;
    }

    /** @param array<mixed> */
    public function generateToken(array $data): TokenIntegrator
    {
        $name = $data['name'];
        $tokenGenerated = GenerateHash::hashAleatory($name);

        $tokenIntegrator = new TokenIntegrator(
            null,
            $name,
            $tokenGenerated,
            new CreatedAt(),
            new UpdatedAt(),
            null
        );

        return $this->tokenIntegratorEntity->save($tokenIntegrator);
    }
}