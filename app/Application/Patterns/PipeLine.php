<?php

namespace App\Application\Patterns;

use App\Application\Engine\EngineInterface;

final class PipeLine implements EngineInterface
{
    public function start($payload,array $stages)
    {
        foreach ($stages as $stage) {
            $payload = call_user_func (  $stage ,$payload );
        }

        return $payload;
    }
}
