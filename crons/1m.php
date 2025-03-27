<?php

require __DIR__ . '/../include/globals_nonauth.php';

global $db;

$db->execute('UPDATE users SET hospital = hospital - 1 WHERE hospital > 0');
$db->execute('UPDATE settings SET conf_value = (SELECT COUNT(*) FROM users WHERE hospital > 0) WHERE conf_name = :count', ['count' => 'hospital_count']);

$db->execute('UPDATE users SET jail = jail - 1 WHERE jail > 0');
$db->execute('UPDATE settings SET conf_value = (SELECT COUNT(*) FROM users WHERE jail > 0) WHERE conf_name = :count', ['count' => 'jail_count']);
