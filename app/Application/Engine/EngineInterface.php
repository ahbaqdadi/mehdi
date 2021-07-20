<?php

namespace App\Application\Engine;


interface EngineInterface
{
    public function start($payload,array $stages);
}
