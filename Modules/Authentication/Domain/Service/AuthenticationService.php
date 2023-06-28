<?php

namespace Modules\Authentication\Domain\Service;

use Modules\Authentication\Domain\Utils\GenerateHash;

class AuthenticationService
{
    public function generateToken()
    {
        $tokenGenerated = GenerateHash::hashAleatory();
        dd('okok');
    }
}