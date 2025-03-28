<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Classes\ResponseEmitter;
use App\Controllers\LoginController;
use Dotenv\Dotenv;
use Dotenv\Repository\Adapter\EnvConstAdapter;
use Dotenv\Repository\RepositoryBuilder;
use Slim\Psr7\Factory\ServerRequestFactory;

Dotenv::create(RepositoryBuilder::createWithNoAdapters()
    ->addAdapter(EnvConstAdapter::class)
    ->immutable()
    ->make(), dirname(__DIR__)
)->load();

session_start(['name' => 'MCCSID']);
if (!isset($_SESSION['started'])) {
    session_regenerate_id();
    $_SESSION['started'] = microtime(true);
}

if (array_key_exists('userid', $_SESSION) && is_numeric($_SESSION['userid']) && ($_SESSION['userid'] > 0)) {
    header('Location: /');
    exit;
}

(new ResponseEmitter())
    ->emit((new LoginController())(ServerRequestFactory::createFromGlobals()));
