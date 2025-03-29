<?php

global $db, $ir, $userid, $h;
require __DIR__ . '/../include/sglobals.php';

$_POST['ID']         =
    (isset($_POST['ID']) && is_numeric($_POST['ID']))
        ? abs(intval($_POST['ID'])) : '';
$_POST['staffnotes'] =
    (isset($_POST['staffnotes']) && !is_array($_POST['staffnotes']))
        ? $db->escape(
        strip_tags(stripslashes($_POST['staffnotes'])))
        : '';
if (empty($_POST['ID']) || empty($_POST['staffnotes'])) {
    echo 'You must enter data for this to work.
    <br />&gt; <a href="/home">Go Home</a>';
    $h->endpage();
    exit;
}
$q =
    $db->query(
        "SELECT `staffnotes`
                 FROM `users`
                 WHERE `userid` = {$_POST['ID']}");
if ($db->num_rows($q) == 0) {
    $db->free_result($q);
    echo 'That user does not exist.
    <br />&gt; <a href="/home">Go Home</a>';
    $h->endpage();
    exit;
}
$old = $db->escape($db->fetch_single($q));
$db->free_result($q);
$db->query(
    "UPDATE `users`
         SET `staffnotes` = '{$_POST['staffnotes']}'
         WHERE `userid` = '{$_POST['ID']}'");
$db->query(
    "INSERT INTO `staffnotelogs`
         VALUES (NULL, $userid, {$_POST['ID']}, " . time()
    . ", '$old',
          '{$_POST['staffnotes']}')");
echo '
User notes updated!
<br />
&gt; <a href="viewuser.php?u=' . $_POST['ID']
    . '">Back To Profile</a>
 ';
$h->endpage();
