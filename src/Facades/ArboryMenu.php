<?php

namespace CubeAgency\ArboryMenu\Facades;

use Illuminate\Support\Facades\Facade;

class ArboryMenu extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'arborymenu';
    }
}
