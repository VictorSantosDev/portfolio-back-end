<?php

namespace Modules\Authentication\Domain\Service;

use Exception;
use App\Data\DateTime\CreatedAt;
use App\Data\DateTime\UpdatedAt;
use Modules\Authentication\Domain\Utils\GenerateHash;
use Modules\Authentication\Domain\Entity\TokenIntegrator;
use Modules\Authentication\Infrastructure\Entity\TokenIntegratorEntity;
use Modules\Authentication\Infrastructure\Repository\TokenIntegratorRepository;
use Modules\Authentication\Infrastructure\Repository\SecretAuthorizationRepository;
use Modules\Authentication\Domain\Infrastructure\Entity\InterfaceTokenIntegratorEntity;
use Modules\Authentication\Domain\Infrastructure\Repository\InterfaceTokenIntegratorRepository;
use Modules\Authentication\Domain\Infrastructure\Repository\InterfaceSecretAuthorizationRepository;

class AuthenticationService
{
    private InterfaceTokenIntegratorEntity $tokenIntegratorEntity;

    private InterfaceSecretAuthorizationRepository $secretAuthorizationRepository;

    private InterfaceTokenIntegratorRepository $tokenIntegratorRepository;

    public function __construct(
        TokenIntegratorEntity $tokenIntegratorEntity,
        SecretAuthorizationRepository $secretAuthorizationRepository,
        TokenIntegratorRepository $tokenIntegratorRepository
    ) {
        $this->tokenIntegratorEntity = $tokenIntegratorEntity;
        $this->secretAuthorizationRepository = $secretAuthorizationRepository;
        $this->tokenIntegratorRepository = $tokenIntegratorRepository;
    }

    /** @param array<mixed> */
    public function auth(array $data): bool
    {
        $token = $data['token'];
        $secret = $data['secret'];

        $this->verifyTokenIntegrator($token);
        $this->verifySecretAuthorization($secret);

        return true;
    }

    public function verifyTokenIntegrator(string $token): bool
    {
        $tokenIntegrator = $this->tokenIntegratorRepository->findToken($token);

        if($token !== $tokenIntegrator->getToken())
            throw new Exception('Falha na autenticação.');

        return true;
    }

    public function verifySecretAuthorization(string $secret): bool
    {
        $security = md5($secret) . env('KEY_AUTHORIZATION');
        $collection = $this->secretAuthorizationRepository->getAll();
        
        foreach ($collection->all() as $secrets) {
            if (password_verify($security, $secrets->getSecret())) {
                return true;
            }
        }

        throw new Exception('Falha na autenticação.');
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