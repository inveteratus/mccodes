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

$email = $error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = array_key_exists('email', $_POST) && is_string($_POST['email']) ? trim($_POST['email']) : '';
    $password = array_key_exists('password', $_POST) && is_string($_POST['password']) ? trim($_POST['password']) : '';

    if (strlen($email) && strlen($password)) {
        $env = Dotenv::createArrayBacked(dirname(__DIR__))->load();
        $db = new Database("mysql:host={$env['MYSQL_HOST']};charset=utf8mb4;dbname={$env['MYSQL_DATABASE']}", $env['MYSQL_USER'], $env['MYSQL_PASSWORD']);
        $user = $db->execute('SELECT userid AS id, userpass AS password, pass_salt AS salt FROM users WHERE email = :email', ['email' => $email])->fetch(PDO::FETCH_OBJ) ?: null;
        if ($user && !strcmp($user->password, md5($user->salt . md5($password)))) {
            $now = time();
            $sql = <<<SQL
                UPDATE users
                SET lastip_login = :ip, last_login = :time
                WHERE userid = :id
            SQL;
            $db->execute($sql, ['ip' => $_SERVER['REMOTE_ADDR'], 'time' => time(), 'id' => $user->id]);

            $_SESSION['userid'] = (int)$user->id;
            $_SESSION['loggedin'] = true;

            session_regenerate_id();
            session_write_close();

            header('Location: /loggedin.php');
            exit;
        }
        else {
            $error = '<span class="text-red-500 text-sm">Invalid Credentials</span>';
        }
    }
}

(new View())->render('login', [
    'email' => $email,
    'error' => $error,
]);
