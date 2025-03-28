<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Classes\Database;
use App\Classes\View;
use Dotenv\Dotenv;

session_start(['name' => 'MCCSID']);
if (!isset($_SESSION['started'])) {
    session_regenerate_id();
    $_SESSION['started'] = microtime(true);
}

if (array_key_exists('userid', $_SESSION) && is_numeric($_SESSION['userid']) && ($_SESSION['userid'] > 0)) {
    header('Location: /');
    exit;
}

$name = $email = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $env = Dotenv::createArrayBacked(dirname(__DIR__))->load();
    $db = new Database("mysql:host={$env['MYSQL_HOST']};charset=utf8mb4;dbname={$env['MYSQL_DATABASE']}", $env['MYSQL_USER'], $env['MYSQL_PASSWORD']);

    $name = array_key_exists('name', $_POST) && is_string($_POST['name']) ? trim($_POST['name']) : '';
    $email = array_key_exists('email', $_POST) && is_string($_POST['email']) ? trim($_POST['email']) : '';
    $password = array_key_exists('password', $_POST) && is_string($_POST['password']) ? trim($_POST['password']) : '';
    $confirm = array_key_exists('confirm', $_POST) && is_string($_POST['confirm']) ? trim($_POST['confirm']) : '';

    if (!strlen($name)) {
        $errors['name'] = 'Name is required';
    }
    elseif (strlen($name) > 25) {
        $errors['name'] = 'Name cannot be longer than 25 characters';
    }
    elseif ($db->execute('SELECT COUNT(*) FROM users WHERE username = :name', ['name' => $name])->fetchColumn() > 0) {
        $errors['name'] = 'Name already exists';
    }

    if (!strlen($email)) {
        $errors['email'] = 'Email is required';
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email must be a valid email address';
    }
    elseif (strlen($name) > 25) {
        $errors['name'] = 'Email cannot be longer than 255 characters';
    }
    elseif ($db->execute('SELECT COUNT(*) FROM users WHERE email = :email', ['email' => $email])->fetchColumn() > 0) {
        $errors['email'] = 'Email already exists';
    }

    if (!strlen($password)) {
        $errors['password'] = 'Password is required';
    }
    else if (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters';
    }
    elseif ($password !== $confirm) {
        $errors['password'] = 'Passwords do not match';
    }

    if (!count($errors)) {
        $salt = substr(str_shuffle(implode('', array_filter(array_map('chr', range(33, 127)), 'ctype_alnum'))), -8);
        $sql = <<<SQL
            INSERT INTO users (username, userpass, level, money, energy, will, maxwill, brave, maxbrave, maxenergy, hp,
                               maxhp, location, signedup, email, display_pic, staffnotes, lastip_signup, voted,
                               user_notepad, pass_salt)
                VALUES (:name, :password, 1, 100, 12, 100, 100, 5, 5, 12, 100, 100, 1, UNIX_TIMESTAMP(), :email, '',
                        '', :ip, '', '', :salt)
        SQL;
        $db->execute($sql, [
            'name' => $name,
            'password' => md5($salt . md5($password)),
            'email' => $email,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'salt' => $salt
        ]);

        $id = $db->lastInsertId();

        $sql = <<<SQL
            INSERT INTO userstats (userid, strength, agility, guard, labour, IQ) VALUES (:id, 10, 10, 10, 10, 10)
        SQL;
        $db->execute($sql, [
            'id' => $id,
        ]);

        $_SESSION['userid'] = $id;
        $_SESSION['loggedin'] = true;

        session_regenerate_id();
        session_write_close();

        header('Location: /loggedin.php');
        exit;
    }
}

(new View())->render('register', [
    'name' => $name,
    'email' => $email,
    'errors' => $errors,
]);
