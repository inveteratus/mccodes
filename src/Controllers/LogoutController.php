<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LogoutController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $_SESSION = [];
        session_regenerate_id(true);

        return redirect('/');
    }
}
