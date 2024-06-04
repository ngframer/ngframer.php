<?php

namespace app\middlewares;

use NGFramer\NGFramerPHPBase\middleware\Middleware;
use NGFramer\NGFramerPHPBase\Request;
use NGFramer\NGFramerPHPExceptions\exceptions\ForbiddenException;

class Auth extends Middleware
{
    public function execute(Request $request, callable $callback): void
    {
        Throw new ForbiddenException();
    }
}