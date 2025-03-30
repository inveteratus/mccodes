<?php

namespace App\Controllers;

use App\Classes\View;
use App\Repositories\UserRepository;
use DI\Attribute\Inject;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class RegisterController
{
    #[Inject]
    protected UserRepository $users;

    #[Inject]
    protected View $view;

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        return $this->view->renderToResponse('register');
    }

    public function register(ServerRequestInterface $request): ResponseInterface
    {
        $errors = [];

        $name = $this->post($request, 'name');
        $email = $this->post($request, 'email');
        $password = $this->post($request, 'password');
        $confirm = $this->post($request, 'confirm');

        if (!strlen($name)) {
            $errors['name'] = 'Name is required';
        } elseif (strlen($name) > 25) {
            $errors['name'] = 'Name cannot be longer than 25 characters';
        } elseif ($this->users->nameExists($name)) {
            $errors['name'] = 'Name already exists';
        }

        if (!strlen($email)) {
            $errors['email'] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be a valid email address';
        } elseif (strlen($name) > 25) {
            $errors['name'] = 'Email cannot be longer than 255 characters';
        } elseif ($this->users->emailExists($email)) {
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
            $_SESSION['userid'] = $this->users->createUser($name, $email, $password);
            $_SESSION['loggedin'] = true;
            session_regenerate_id();

            return redirect('/home');
        }

        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = ['name' => $name, 'email' => $email];

        return redirect('/register')
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
