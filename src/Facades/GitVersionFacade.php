<?php

namespace Bluora\LaravelGitVersion\Facades;

use Illuminate\Support\Facades\Facade;

class GitVersionFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'GitVersion';
    }
}
