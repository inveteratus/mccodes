<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Classes\Database;
use App\Classes\ResponseEmitter;
use App\Classes\View;
use App\Controllers\ExploreController;
use App\Controllers\HomeController;
use App\Controllers\IndexController;
use App\Controllers\InventoryController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\RegisterController;
use DI\ContainerBuilder;
use Dotenv\Dotenv;
use Dotenv\Repository\Adapter\ArrayAdapter;
use Dotenv\Repository\RepositoryBuilder;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Psr\Container\ContainerInterface;
use Slim\Psr7\Factory\ServerRequestFactory;
use function FastRoute\simpleDispatcher;

session_start(['name' => 'MCCSID']);
if (!isset($_SESSION['started'])) {
    session_regenerate_id();
    $_SESSION['started'] = microtime(true);
}

$container = (new ContainerBuilder())
    ->useAttributes(true)
    ->addDefinitions([
        'env' => fn() => Dotenv::create(RepositoryBuilder::createWithNoAdapters()
            ->addAdapter(ArrayAdapter::class)
            ->immutable()
            ->make(), dirname(__DIR__)
        )->load(),

        Database::class => function (ContainerInterface $container) {
            $env = $container->get('env');
            return new Database(
                dsn: "mysql:host={$env['MYSQL_HOST']};charset=utf8mb4;dbname={$env['MYSQL_DATABASE']}",
                user: $env['MYSQL_USER'],
                password: $env['MYSQL_PASSWORD']
            );
        },

        View::class => fn() => new View(),
    ])
    ->build();

$request = ServerRequestFactory::createFromGlobals();
if (in_array($request->getUri()->getPath(), ['/', '/login', '/register'])) {
    if (array_key_exists('userid', $_SESSION) && ($_SESSION['userid'] > 0)) {
        header('Location: /home');
        exit;
    }
} elseif (!array_key_exists('userid', $_SESSION) || !is_numeric($_SESSION['userid']) || ($_SESSION['userid'] < 1)) {
    header('Location: /login');
    exit;
}

$dispatcher = simpleDispatcher(function (RouteCollector $collector) {
    # Guest routes
    $collector->addRoute('GET', '/', IndexController::class);
    $collector->addRoute('GET', '/login', LoginController::class);
    $collector->addRoute('POST', '/login', [LoginController::class, 'login']);
    $collector->addRoute('GET', '/register', RegisterController::class);
    $collector->addRoute('POST', '/register', [RegisterController::class, 'register']);

    # Authorised routes
    $collector->addRoute('POST', '/logout', LogoutController::class);
    $collector->addRoute('GET', '/home', HomeController::class);
    $collector->addRoute('POST', '/home', [HomeController::class, 'updateNotes']);
    $collector->addRoute('GET', '/explore', ExploreController::class);
    $collector->addRoute('GET', '/inventory', InventoryController::class);
    $collector->addGroup('/inventory', function (RouteCollector $collector) {
        $collector->addRoute('POST', '/wear/{itemID:\d+}', [InventoryController::class, 'wear']);
        $collector->addRoute('POST', '/wield/{itemID:\d+}', [InventoryController::class, 'wield']);
        $collector->addRoute('POST', '/remove/{from:primary|secondary|armor}', [InventoryController::class, 'remove']);
    });
});

$route = $dispatcher->dispatch($request->getMethod(), $request->getUri()->getPath());
$response = match ($route[0]) {
    Dispatcher::NOT_FOUND => $container->get(View::class)->renderToResponse('404'),
    Dispatcher::METHOD_NOT_ALLOWED => $container->get(View::class)->renderToResponse('405'),
    Dispatcher::FOUND => $container->call($route[1], [
        'request' => $request->withAttribute('user_id', $_SESSION['userid'] ?? 0),
        ...$route[2]
    ]),
    default => null,
};

(new ResponseEmitter())
    ->emit($response);
