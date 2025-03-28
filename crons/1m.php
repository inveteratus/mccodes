<?php

require __DIR__ . '/../include/globals_nonauth.php';

global $db;

$db->execute('UPDATE users SET hospital = hospital - 1 WHERE hospital > 0');
$db->execute('UPDATE users SET jail = jail - 1 WHERE jail > 0');
