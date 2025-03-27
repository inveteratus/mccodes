<?php

global $db, $h;
require __DIR__ . '/../include/globals.php';
echo '<h3>Users Online</h3>';
$cn = 0;
$expiry_time = time() - 900;
$q =
        $db->query(
                'SELECT `userid`, `username`, `laston`
                 FROM `users`
                 WHERE `laston` > ' . $expiry_time
                        . '
                 ORDER BY `laston` DESC');
while ($r = $db->fetch_row($q))
{
    $cn++;
    echo $cn . '. <a href="viewuser.php?u=' . $r['userid'] . '">'
            . $r['username'] . '</a> (' . datetime_parse($r['laston'])
            . ')
	<br />
   	';
}
$db->free_result($q);
$h->endpage();
