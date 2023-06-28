<?php

namespace Modules\Authentication\Infrastructure\Entity\TokenIntegratorEntity;

use Modules\Authentication\Domain\Entity\TokenIntegrator;
use Modules\Authentication\Entities\TokenIntegrator as TokenIntegratorModel;

class TokenIntegratorEntity 
implements \Modules\Authentication\Domain\Infrastructure\Entity\TokenIntegratorEntity
{
    public function __construct(
        private $model = new TokenIntegratorModel
    ) {
    }

    public function save(TokenIntegrator $tokenIntegrator): TokenIntegrator
    {
        dd('save');
    }
}
