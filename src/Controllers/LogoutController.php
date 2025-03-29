<?php

namespace App\Controllers;

use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Psr7\Factory\ResponseFactory;

class LogoutController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $_SESSION = [];
        session_regenerate_id(true);

        return (new ResponseFactory())
            ->createResponse(StatusCodeInterface::STATUS_FOUND)
            ->withHeader('Location', '/');
    }
}
