<?php

namespace App\Controllers;

use App\Classes\Database;
use App\Classes\View;
use Fig\Http\Message\StatusCodeInterface;
use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Psr7\Factory\ResponseFactory;

class LoginController
{
    protected Database $db;
    protected View $view;

    public function __construct()
    {
        $this->db = new Database(
            dsn: "mysql:host={$_ENV['MYSQL_HOST']};charset=utf8mb4;dbname={$_ENV['MYSQL_DATABASE']}",
            user: $_ENV['MYSQL_USER'],
            password: $_ENV['MYSQL_PASSWORD']
        );

        $this->view = new View();
    }

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $email = $error = '';

        if ($request->getMethod() === 'POST') {
            $email = $this->post($request, 'email');
            $password = $this->post($request, 'password');

            if (strlen($email) && strlen($password)) {
                $user = $this->getUser($email);
                if ($user && !strcmp($user->password, md5($user->salt . md5($password)))) {
                    $this->updateLastLogin($user->id);

                    $_SESSION['userid'] = (int)$user->id;
                    $_SESSION['loggedin'] = true;

                    session_regenerate_id();
                    session_write_close();

                    return (new ResponseFactory())
                        ->createResponse(StatusCodeInterface::STATUS_FOUND)
                        ->withHeader('Location', '/loggedin.php');
                }

                $error = 'Invalid Credentials';
            }
        }

        return $this->view->renderToResponse('login', [
            'email' => $email,
            'error' => $error,
        ]);
    }

    private function post(ServerRequestInterface $request, string $field): string
    {
        $params = (array)$request->getParsedBody();

        return array_key_exists($field, $params) && is_string($params[$field])
            ? trim($params[$field])
            : '';
    }

    private function getUser(string $email): ?object
    {
        $sql = <<<SQL
            SELECT userid AS id, userpass AS password, pass_salt AS salt
            FROM users
            WHERE email = :email
        SQL;

        return $this->db->execute($sql, [
            'email' => $email,
        ])->fetch(PDO::FETCH_OBJ) ?: null;
    }

    private function updateLastLogin(int $uid): void
    {
        $sql = <<<SQL
            UPDATE users
            SET lastip_login = :ip, last_login = :time
            WHERE userid = :id
        SQL;
        $this->db->execute($sql, [
            'ip' => $_SERVER['REMOTE_ADDR'],
            'time' => time(),
            'id' => $uid,
        ]);
    }
}
