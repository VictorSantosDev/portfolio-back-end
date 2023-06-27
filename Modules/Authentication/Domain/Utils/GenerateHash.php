<?php

namespace Modules\Authentication\Domain\Utils;

class GenerateHash
{
    public static function hashAleatory(): string
    {
        return hash("sha256", rand(0, str_repeat(9, 10)), false);
    }
}
