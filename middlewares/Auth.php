<?php

namespace App\Middlewares;

use App\Exceptions\AppException;
use NGFramer\NGFramerPHPBase\Middleware\BaseMiddleware;
use NGFramer\NGFramerPHPBase\Request;

class Auth extends BaseMiddleware
{
    public function execute(Request $request, callable $callback): void
    {
        throw new AppException('You are not authorized to access page.', 0, 'app.unauthorized', null, 401);
    }
}