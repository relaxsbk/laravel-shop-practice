<?php

namespace App\Services;

class FromActionService
{
    public function nameAction($name): string
    {
        return trim(mb_ucfirst(mb_strtolower($name)));
    }


}
