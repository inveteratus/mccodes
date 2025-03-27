<?php

global $db, $ir, $userid, $h;
require __DIR__ . '/../include/globals.php';
if (!isset($_GET['type'])
        || !in_array($_GET['type'],
                ['equip_primary', 'equip_secondary', 'equip_armor'],
                true))
{
    echo 'This slot ID is not valid.';
    $h->endpage();
    exit;
}
if ($ir[$_GET['type']] == 0)
{
    echo 'You do not have anything equipped in this slot.';
    $h->endpage();
    exit;
}
item_add($userid, $ir[$_GET['type']], 1);
$db->query(
        "UPDATE `users`
        SET `{$_GET['type']}` = 0
        WHERE `userid` = {$ir['userid']}");
$names =
        ['equip_primary' => 'Primary Weapon',
                'equip_secondary' => 'Secondary Weapon',
                'equip_armor' => 'Armor'];
echo 'The item in your ' . $names[$_GET['type']]
        . ' slot was successfully unequipped.';
$h->endpage();
