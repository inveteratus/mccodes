<?php

session_name('MCCSID');
@session_start();
if (!isset($_SESSION['started']))
{
    session_regenerate_id();
    $_SESSION['started'] = true;
}
ob_start();
require __DIR__ . '/basic_error_handler.php';
set_error_handler('error_php');
global $_CONFIG;
require __DIR__ . '/config.php';
const MONO_ON = 1;
require __DIR__ . '/database.php';
require __DIR__ . '/global_func.php';
$dsn = 'mysql:host='.$_CONFIG['hostname'].';charset=utf8mb4;dbname='.$_CONFIG['database'];
$db = new database($dsn, $_CONFIG['username'], $_CONFIG['password']);
$db->configure($_CONFIG['hostname'], $_CONFIG['username'],
        $_CONFIG['password'], $_CONFIG['database']);
$db->connect();
$c = $db->connection_id;
$set = [];
$settq = $db->query('SELECT *
					 FROM `settings`');
while ($r = $db->fetch_row($settq))
{
    $set[$r['conf_name']] = $r['conf_value'];
}
