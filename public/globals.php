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
$set = get_site_settings();
if ($set['use_timestamps_over_crons']) {
    define('SILENT_CRONS', true);
    try {
        require_once __DIR__ . '/crons/cronless_crons.php';
    } catch (Exception $e) {
        echo 'An error occurred' . (defined('DEBUG') && DEBUG ? ':<br>'.$e->getMessage() : '');
        exit;
    }
}
global $jobquery, $housequery;
if (isset($jobquery) && $jobquery)
{
    $is =
            $db->query(
                    "SELECT `u`.*, `us`.*, `j`.*, `jr`.*
                     FROM `users` AS `u`
                     INNER JOIN `userstats` AS `us`
                     ON `u`.`userid`=`us`.`userid`
                     LEFT JOIN `jobs` AS `j` ON `j`.`jID` = `u`.`job`
                     LEFT JOIN `jobranks` AS `jr`
                     ON `jr`.`jrID` = `u`.`jobrank`
                     WHERE `u`.`userid` = {$userid}
                     LIMIT 1");
}
elseif (isset($housequery) && $housequery)
{
    $is =
            $db->query(
                    "SELECT `u`.*, `us`.*, `h`.*
                     FROM `users` AS `u`
                     INNER JOIN `userstats` AS `us`
                     ON `u`.`userid`=`us`.`userid`
                     LEFT JOIN `houses` AS `h` ON `h`.`hWILL` = `u`.`maxwill`
                     WHERE `u`.`userid` = {$userid}
                     LIMIT 1");
}
else
{
    $is =
            $db->query(
                    "SELECT `u`.*, `us`.*
                     FROM `users` AS `u`
                     INNER JOIN `userstats` AS `us`
                     ON `u`.`userid`=`us`.`userid`
                     WHERE `u`.`userid` = {$userid}
                     LIMIT 1");
}
$ir = $db->fetch_row($is);
set_userdata_data_types($ir);
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
