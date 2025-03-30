<?php

namespace App\Controllers;

use App\Classes\View;
use App\Repositories\UserRepository;
use DI\Attribute\Inject;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LoginController
{
    #[Inject]
    protected UserRepository $users;

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
            $user = $this->users->getByEmail($email);
            if ($user && !strcmp($user->password, md5($user->salt . md5($password)))) {
                $this->users->updateLastLogin($user->id);

                $_SESSION['userid'] = (int)$user->id;
                $_SESSION['loggedin'] = true;

                session_regenerate_id();

                return redirect('/home');
            }

            $errors['email'] = 'Invalid Credentials';
        }

        $_SESSION['old'] = ['email' => $email];

        return redirect('/login')
            ->withErrors($errors);
    }

    private function post(ServerRequestInterface $request, string $field): string
    {
        $params = (array)$request->getParsedBody();

        return array_key_exists($field, $params) && is_string($params[$field])
            ? trim($params[$field])
            : '';
    }
}
