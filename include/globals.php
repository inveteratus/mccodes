<?php

session_name('MCCSID');
session_start();
if (!isset($_SESSION['started']))
{
    session_regenerate_id();
    $_SESSION['started'] = true;
}
ob_start();
require __DIR__ . '/basic_error_handler.php';
set_error_handler('error_php');
require __DIR__ . '/global_func.php';
$domain = determine_game_urlbase();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == 0)
{
    $login_url = "/login.php";
    header("Location: {$login_url}");
    exit;
}
$userid = (int)($_SESSION['userid'] ?? 0);
require __DIR__ . '/header.php';

global $_CONFIG;
require __DIR__ . '/config.php';
const MONO_ON = 1;
require __DIR__ . '/database.php';
$dsn = 'mysql:host='.$_CONFIG['hostname'].';charset=utf8mb4;dbname='.$_CONFIG['database'];
$db = new database($dsn, $_CONFIG['username'], $_CONFIG['password']);
$db->configure($_CONFIG['hostname'], $_CONFIG['username'],
        $_CONFIG['password'], $_CONFIG['database']);
$db->connect();
$c = $db->connection_id;

$set = $db->execute('SELECT conf_name, conf_value FROM settings')->fetchAll(PDO::FETCH_ASSOC);
$sql = <<<SQL
    SELECT u.*, us.*, j.*, jr.*, h.*, g.*, c.*
    FROM users u
    LEFT JOIN userstats us USING (userid)
    LEFT JOIN jobranks jr ON jr.jrID = u.jobrank
    LEFT JOIN jobs j ON j.jID = jr.jrJOB
    LEFT JOIN houses h ON h.hWILL = u.maxwill
    LEFT JOIN gangs g ON g.gangID = u.gang
    LEFT JOIN cities c ON c.cityID = u.location
    WHERE u.userid = :userid
SQL;

$ir = $db->execute($sql, ['userid' => $userid])->fetch(PDO::FETCH_ASSOC);

//echo '<pre>' . print_r($ir, true) . '</pre>';
//exit;

// set_userdata_data_types($ir);
if ($ir['force_logout'] > 0)
{
    $db->query(
            "UPDATE `users`
    			SET `force_logout` = 0
    			WHERE `userid` = {$userid}");
    session_unset();
    session_destroy();
    $login_url = "/login.php";
    header("Location: {$login_url}");
    exit;
}
global $macropage;
if ($macropage && !$ir['verified'] && $set['validate_on'] == 1)
{
    $macro_url = "/macro1.php?refer=$macropage";
    header("Location: {$macro_url}");
    exit;
}
check_level();
$h = new headers();
if (!isset($nohdr) || !$nohdr)
{
    $h->startheaders();
    $fm = money_formatter($ir['money']);
    $cm = money_formatter($ir['crystals'], '');
    $lv = date('F j, Y, g:i a', $ir['laston']);
    global $atkpage;
    if ($atkpage)
    {
        $h->userdata($ir, $lv, $fm, $cm, 0);
    }
    else
    {
        $h->userdata($ir, $lv, $fm, $cm);
    }
    global $menuhide;
    if (!$menuhide)
    {
        $h->menuarea();
    }
}
