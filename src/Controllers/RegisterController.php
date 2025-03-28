<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class RegisterController extends Controller
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $name = $email = '';
        $errors = [];

        if ($request->getMethod() === 'POST') {
            $name = $this->post($request, 'name');
            $email = $this->post($request, 'email');
            $password = $this->post($request, 'password');
            $confirm = $this->post($request, 'confirm');

            if (!strlen($name)) {
                $errors['name'] = 'Name is required';
            } elseif (strlen($name) > 25) {
                $errors['name'] = 'Name cannot be longer than 25 characters';
            } elseif ($this->nameExists($name)) {
                $errors['name'] = 'Name already exists';
            }

            if (!strlen($email)) {
                $errors['email'] = 'Email is required';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email must be a valid email address';
            } elseif (strlen($name) > 25) {
                $errors['name'] = 'Email cannot be longer than 255 characters';
            } elseif ($this->emailExists($email)) {
                $errors['email'] = 'Email already exists';
            }

            if (!strlen($password)) {
                $errors['password'] = 'Password is required';
            } else if (strlen($password) < 8) {
                $errors['password'] = 'Password must be at least 8 characters';
            } elseif ($password !== $confirm) {
                $errors['password'] = 'Passwords do not match';
            }

            if (!count($errors)) {
                $_SESSION['userid'] = $this->createUser($name, $email, $password);
                $_SESSION['loggedin'] = true;

                session_regenerate_id();
                session_write_close();

                header('Location: /loggedin.php');
                exit;
            }
        }

        return $this->view->renderToResponse('register', [
            'name' => $name,
            'email' => $email,
            'errors' => $errors,
        ]);
    }

    private function post(ServerRequestInterface $request, string $field): string
    {
        $params = (array)$request->getParsedBody();

        return array_key_exists($field, $params) && is_string($params[$field])
            ? trim($params[$field])
            : '';
    }

    private function nameExists(string $name): bool
    {
        $sql = 'SELECT COUNT(*) FROM users WHERE username = :name';

        return $this->db->execute($sql, ['name' => $name])->fetchColumn() > 0;
    }

    private function emailExists(string $email): bool
    {
        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        return $this->db->execute($sql, ['email' => $email])->fetchColumn() > 0;
    }

    private function createUser(string $name, string $email, string $password): int
    {
        $salt = substr(sha1(random_bytes(256)), -8);
        $sql = <<<SQL
            INSERT INTO users (username, userpass, level, money, energy, will, maxwill, brave, maxbrave, maxenergy, hp,
                               maxhp, location, signedup, email, display_pic, staffnotes, lastip_signup, voted,
                               user_notepad, pass_salt)
                VALUES (:name, :password, 1, 100, 12, 100, 100, 5, 5, 12, 100, 100, 1, UNIX_TIMESTAMP(), :email, '',
                        '', :ip, '', '', :salt)
        SQL;
        $this->db->execute($sql, [
            'name' => $name,
            'password' => md5($salt . md5($password)),
            'email' => $email,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'salt' => $salt
        ]);

        $id = (int)$this->db->lastInsertId();
        $sql = <<<SQL
            INSERT INTO userstats (userid, strength, agility, guard, labour, IQ) VALUES (:id, 10, 10, 10, 10, 10)
        SQL;
        $this->db->execute($sql, [
            'id' => $id,
        ]);

        return $id;
    }
}
