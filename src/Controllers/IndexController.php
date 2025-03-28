<?php

namespace App\Controllers;

use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Psr7\Factory\ResponseFactory;

class IndexController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        return (new ResponseFactory())
            ->createResponse(StatusCodeInterface::STATUS_FOUND)
            ->withHeader('Location', '/home');

    }
}
