<?php

$nohdr = 1;

global $db, $ir, $userid, $set, $domain;

require __DIR__ . '/../include/globals.php';
if (!$set['validate_on'] || $ir['verified'])
{
    echo 'What are you doing on this page? Go somewhere else.';
    exit;
}

if (!isset($_POST['refer']) || !is_string($_POST['refer']) || !isset($_POST['captcha']) || !is_string($_POST['captcha']))
{
    echo 'Invalid usage.';
    exit;
}

$macro1_url = "/macro1.php?code=invalid&amp;refer=" . urlencode(stripslashes($_POST['refer']));

if (!isset($_SESSION['captcha']))
{
    header("Location: {$macro1_url}");
    exit;
}

if ($_SESSION['captcha'] != stripslashes($_POST['captcha']))
{
    header("Location: {$macro1_url}");
    exit;
}

if (!isset($_POST['verf'])  || !verify_csrf_code('validation', stripslashes($_POST['verf'])))
{
    header("Location: {$macro1_url}");
    exit;
}

$ref = trim($_POST['refer'], '/');
unset($_SESSION['captcha']);
$dest_url = "/{$ref}";
$db->query(
        "UPDATE `users`
		 SET `verified` = 1
		 WHERE `userid` = {$userid}");
header("Location: {$dest_url}");
