<?php

require __DIR__ . '/../include/globals_nonauth.php';

global $db;

$db->execute('UPDATE gangs SET gangCHOURS = gangCHOURS - 1 WHERE gangCRIME > 0 AND gangCHOURS > 0');

$sql = <<<SQL
    SELECT g.gangID, o.ocSTARTTEXT, o.ocSUCCTEXT, o.ocFAILTEXT, o.ocMINMONEY, o.ocMAXMONEY, o.ocID, o.ocNAME
    FROM gangs g
    LEFT JOIN orgcrimes o ON g.gangCRIME = o.ocID
    WHERE g.gangCRIME > 0 AND g.gangCHOURS <= 0
SQL;
$rows = $db->execute($sql)->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $r) {
    $members = $db->execute('SELECT userid FROM users WHERE gang = :gang', ['gang' => $r['gangID']])
        ->fetchAll(PDO::FETCH_OBJ);

    if (random_int(1, 100) > 50) {
        $cash = random_int($r['ocMINMONEY'], $r['ocMAXMONEY']);
        $text = str_replace('{{$cash}}', money_formatter($cash), $r['ocSTARTTEXT'] . $r['ocSUCCTEXT']);

        $sql = <<<SQL
            UPDATE gangs SET gangMONEY = gangMONEY + :cash, gangCRIME = 0 WHERE gangID = :gangID
        SQL;
        $db->execute($sql, ['cash' => $cash, 'gangID' => $r['gangID']]);

        $sql = <<<SQL
            INSERT INTO oclogs (oclOC, oclGANG, oclLOG, oclRESULT, oclMONEY, ocCRIMEN, ocTIME)
            VALUES (:oc, :gang, :text, :result, :cash, :crime, :time)
        SQL;
        $db->execute($sql, [
            'oc' => $r['ocID'],
            'gang' => $r['gangID'],
            'text' => $text,
            'result' => 'success',
            'cash' => $cash,
            'crime' => $r['ocNAME'],
            'time' => time(),
        ]);
        $log_id = $db->lastInsertId();

        $sql = <<<SQL
            INSERT INTO events (evUSER, evTIME, evREAD, evTEXT) VALUES (:user, :time, :read, :text)
        SQL;

        foreach ($members as $member) {
            $db->execute($sql, [
                'user' => $member->userid,
                'time' => time(),
                'read' => 0,
                'text' => <<<TEXT
                    Your gang's organized crime succeeded! You may view the details be following this <a href="/oclog.php?ID=$log_id">link</a>
                TEXT
            ]);
        }
    } else {
        $cash = 0;
        $text = str_replace('{{$cash}}', money_formatter($cash), $r['ocSTARTTEXT'] . $r['ocFAILTEXT']);

        $sql = <<<SQL
            UPDATE gangs SET gangMONEY = gangMONEY + :cash, gangCRIME = 0 WHERE gangID = :gangID
        SQL;
        $db->execute($sql, ['cash' => $cash, 'gangID' => $r['gangID']]);

        $sql = <<<SQL
            INSERT INTO oclogs (oclOC, oclGANG, oclLOG, oclRESULT, oclMONEY, ocCRIMEN, ocTIME)
            VALUES (:oc, :gang, :text, :result, :cash, :crime, :time)
        SQL;

        $db->execute($sql, [
            'oc' => $r['ocID'],
            'gang' => $r['gangID'],
            'text' => $text,
            'result' => 'failure',
            'cash' => $cash,
            'crime' => $r['ocNAME'],
            'time' => time(),
        ]);
        $log_id = $db->lastInsertId();

        foreach ($members as $member) {
            $db->execute($sql, [
                'user' => $member->userid,
                'time' => time(),
                'read' => 0,
                'text' => <<<TEXT
                    Your gang's organized crime failed! You may view the details be following this <a href="/oclog.php?ID=$log_id">link</a>
                TEXT
            ]);
        }
    }
}
