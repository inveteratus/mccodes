<?php

require __DIR__ . '/../include/globals_nonauth.php';

global $db;

$sql = <<<SQL
    UPDATE users
    SET brave = LEAST(brave + maxbrave / 10 + 0.5, maxbrave),
        hp = LEAST(hp + maxhp / 3, maxhp),
        will = LEAST(will + 10, maxwill),
        energy = LEAST(maxenergy, energy + maxenergy / IF(donatordays > 0, 6, 12.5))
SQL;

$db->execute($sql);
