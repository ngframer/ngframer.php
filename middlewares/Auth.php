<?php

namespace app\middlewares;

use NGFramer\NGFramerPHPBase\exceptions\ForbiddenException;
use NGFramer\NGFramerPHPBase\middleware\Middleware;
use NGFramer\NGFramerPHPBase\Request;

class Auth extends Middleware
{
    /**
     * @throws ForbiddenException
     */
    public function execute(Request $request, callable $callback): void
    {
        Throw new ForbiddenException('You are not allowed to access this page.');
    }
}