<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Classes\Database;

session_start(['name' => 'MCCSID']);
if (!isset($_SESSION['started'])) {
    session_regenerate_id();
    $_SESSION['started'] = microtime(true);
}

$email = $error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = array_key_exists('email', $_POST) && is_string($_POST['email']) ? trim($_POST['email']) : '';
    $password = array_key_exists('password', $_POST) && is_string($_POST['password']) ? trim($_POST['password']) : '';

    if (strlen($email) && strlen($password)) {
        $env = Dotenv\Dotenv::createArrayBacked(dirname(__DIR__))->load();
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

$email = htmlentities($email);

ob_start(fn ($buffer) => trim(preg_replace('/>\s+</', '><', $buffer)));

echo <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <title>MCCodes</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body class="bg-slate-200 flex flex-col font-sans min-h-screen text-slate-700">
        <main class="flex flex-col flex-grow items-center justify-center space-y-1">
            <form action="/login.php" method="post" class="bg-slate-100 px-8 py-6 border border-slate-300 shadow-md rounded-md flex flex-col space-y-3 max-w-sm w-full">
                <div class="flex flex-col space-y-0.5">
                    <label for="email" class="text-sm text-slate-600 font-medium">Email</label>
                    <input id="email" type="email" name="email" value="{$email}" autofocus autocomplete="email" required class="border border-slate-300 focus:outline-none focus:ring-1 focus:ring-offset-0 focus:border-blue-500 focus:ring-blue-500 p-2 bg-slate-50 w-full rounded" />
                    {$error}
                </div>
                <div class="flex flex-col space-y-0.5">
                    <label for="password" class="text-sm text-slate-600 font-medium">Password</label>
                    <input id="password" type="password" name="password" autocomplete="current-password" required class="border border-slate-300 focus:outline-none focus:ring-1 focus:ring-offset-0 focus:border-blue-500 focus:ring-blue-500 p-2 bg-slate-50 w-full rounded" />
                </div>
                <div>
                    <button type="submit" class="text-sm px-3 py-2 text-white bg-blue-500 focus:ring-2 focus:ring-offset-1 focus:ring-blue-500 focus:ring-offset-slate-50 focus:outline-none rounded font-medium">Login</button>
                </div>
            </form>
            <p class="text-sm">
                <a class="text-slate-600 hover:underline focus:underline focus:outline-none" href="/register.php">Not got an account yet ?</a>
            </p>                             
        </main>
    </body>
    </html>
HTML;
