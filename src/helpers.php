<?php

use App\Classes\Response;
use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Factory\ResponseFactory;

if (!function_exists('error')) {
    function error(string $key): ?string
    {
        static $cache;

        if (!isset($cache)) {
            $cache = [];

            if ((session_status() === PHP_SESSION_ACTIVE) && array_key_exists('errors', $_SESSION)) {
                $cache = $_SESSION['errors'];
                unset($_SESSION['errors']);
            }
        }

        return $cache[$key] ?? null;
    }
}

if (!function_exists('old')) {
    function old(string $key): ?string
    {
        static $cache;

        if (!isset($cache)) {
            $cache = [];

            if ((session_status() === PHP_SESSION_ACTIVE) && array_key_exists('old', $_SESSION)) {
                $cache = $_SESSION['old'];
                unset($_SESSION['old']);
            }
        }

        return $cache[$key] ?? null;
    }
}

if (!function_exists('redirect')) {
    function redirect(string $url): Response
    {
        $response = new Response(StatusCodeInterface::STATUS_FOUND);

        return $response->withHeader('Location', $url);
    }
}
