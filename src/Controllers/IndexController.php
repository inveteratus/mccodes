<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class IndexController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        return redirect('/home');
    }
}
