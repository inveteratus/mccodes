<?php

require __DIR__ . '/../include/globals_nonauth.php';

global $db;

$db->execute('TRUNCATE TABLE votes');
$db->execute('UPDATE users SET daysingang = daysingang + 1 WHERE gang > 0');
$db->execute('UPDATE users SET fedjail = fedjail - 1 WHERE fedjail > 0');
$db->execute('UPDATE users SET boxes_opened = 0, daysold = daysold + 1');
$db->execute('UPDATE users SET mailban = mailban - 1 WHERE mailban > 0');
$db->execute('UPDATE users SET donatordays = donatordays - 1 WHERE donatordays > 0');
$db->execute('UPDATE users SET cdays = cdays - 1 WHERE cdays > 0');

$sql = <<<SQL
    UPDATE users u
    LEFT JOIN userstats us USING (userid)
    LEFT JOIN jobranks jr ON jr.jrID = u.jobrank
    SET u.money = u.money + jr.jrPAY,
        u.exp = u.exp + jr.jrPAY / 20,
        us.strength = us.strength + jr.jrSTRG,
        us.labour = us.labour + jr.jrLABOURG,
        us.IQ = us.IQ + jr.jrIQG
    WHERE u.jobrank > 0
SQL;
$db->execute($sql);

$users = $db->execute('SELECT userid, course FROM users WHERE cdays = 0 AND course > 0')->fetchAll(PDO::FETCH_OBJ);
$courses = $db->execute('SELECT c.crID, c.* FROM courses c')->fetchAll(PDO::FETCH_UNIQUE);

foreach ($users as $user) {
    $db->execute('INSERT INTO coursesdone (userid, courseid) VALUES (:user, :course)', ['user' => $user->userid, 'course' => $user->course]);
    $sql = <<<SQL
        UPDATE userstats
        SET strength = strength + :strength,
            guard = guard + :guard,
            labour = labour + :labour,
            agility = agility + :agility,
            IQ = iq + :iq
        WHERE userid = :user
    SQL;
    $db->execute($sql, [
        'strength' => $courses[$user->course]['crSTR'],
        'guard' => $courses[$user->course]['crGUARD'],
        'labour' => $courses[$user->course]['crLABOUR'],
        'agility' => $courses[$user->course]['crAGIL'],
        'iq' => $courses[$user->course]['crIQ'],
        'user' => $user->userid,
    ]);

    $gains = array_filter([
        number_format($courses[$user->course]['crSTR']) . ' strength',
        number_format($courses[$user->course]['crGUARD']) . ' guard',
        number_format($courses[$user->course]['crLABOUR']) . ' labour',
        number_format($courses[$user->course]['crAGIL']) . ' agility',
        number_format($courses[$user->course]['crIQ']) . ' intelligence',
    ], fn ($line) => !str_starts_with($line, '0'));

    $db->execute('INSERT INTO events (evUSER, evTIME, evREAD, evTEXT) VALUES (:user, :time, :read, :text)', [
        'user' => $user->userid,
        'time' => time(),
        'read' => 0,
        'text' => 'You have complete your course and gained ' . implode(', ', $gains),
    ]);
}

$db->execute('UPDATE users SET course = 0 WHERE cdays = 0 AND course > 0');
