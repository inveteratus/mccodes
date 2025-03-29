<?php

namespace App\Controllers;

use App\Classes\Database;
use App\Classes\View;
use DI\Attribute\Inject;
use Fig\Http\Message\StatusCodeInterface;
use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Psr7\Factory\ResponseFactory;

class LoginController
{
    #[Inject]
    protected Database $db;
    #[Inject]
    protected View $view;

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        return $this->view->renderToResponse('login');
    }

    public function login(ServerRequestInterface $request): ResponseInterface
    {
        $errors = [];

        $email = $this->post($request, 'email');
        $password = $this->post($request, 'password');

        if (!strlen($email)) {
            $errors['email'] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be a valid email address';
        }

        if (!strlen($password)) {
            $errors['password'] = 'Password is required';
        }

        if (!count($errors)) {
            $user = $this->getUser($email);
            if ($user && !strcmp($user->password, md5($user->salt . md5($password)))) {
                $this->updateLastLogin($user->id);

                $_SESSION['userid'] = (int)$user->id;
                $_SESSION['loggedin'] = true;

                session_regenerate_id();
                session_write_close();

                return (new ResponseFactory())
                    ->createResponse(StatusCodeInterface::STATUS_FOUND)
                    ->withHeader('Location', '/home');
            }

            $errors['email'] = 'Invalid Credentials';
        }

        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = ['email' => $email];
        session_write_close();

        return (new ResponseFactory())
            ->createResponse(StatusCodeInterface::STATUS_FOUND)
            ->withHeader('Location', '/login');
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
