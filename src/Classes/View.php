<?php

namespace App\Classes;

use eftec\bladeone\BladeOne;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Factory\ResponseFactory;

class View
{
    private BladeOne $blade;

    public function __construct()
    {
        $this->blade = new BladeOne(
            templatePath: __DIR__ . '/../../views',
            compiledPath: __DIR__ . '/../../cache',
            mode: BladeOne::MODE_DEBUG
        );
    }

    /**
     * @param array<string,mixed> $context
     */
    public function render(string $view, array $context = []): void
    {
        try {
            echo $this->blade->run($view, $context);
        } catch (Exception $e) {
            die('<pre>' . $e->getMessage() . '</pre>');
        }
    }

    public function renderToResponse(string $view, array $context = []): ResponseInterface
    {
        $response = (new ResponseFactory())->createResponse();
        $response->getBody()->write($this->blade->run($view, $context));

        return $response;
    }
}
