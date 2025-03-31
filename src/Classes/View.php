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

        /*
         * Support the @error {{ $message }} @enderror directive
         */
        $this->blade->setErrorFunction('error');
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
        $markup = preg_replace('/>\s+</', '><', trim($this->blade->run($view, $context)));

        $response = (new ResponseFactory())->createResponse();
        $response->getBody()->write($markup);

        return $response;
    }

    public function blade(): BladeOne
    {
        return $this->blade;
    }
}
