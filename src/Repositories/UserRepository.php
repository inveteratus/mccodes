<?php

namespace App\Repositories;

use App\Classes\Database;
use DI\Attribute\Inject;
use PDO;

class UserRepository
{
    #[Inject]
    protected Database $db;

    public function get(int $userID): ?object
    {
        $sql = <<<SQL
            SELECT u.*, us.strength, us.agility, us.guard, us.labour, us.guard, us.IQ as intelligence
            FROM users u
            LEFT JOIN userstats us USING (userid)
            WHERE u.userid = :userID
        SQL;

        return $this->db->execute($sql, ['userID' => $userID])->fetch(PDO::FETCH_OBJ) ?: null;
    }

    public function getByEmail(string $email): ?object
    {
        $sql = <<<SQL
            SELECT userid AS id, userpass AS password, pass_salt AS salt
            FROM users
            WHERE email = :email
        SQL;

        return $this->db->execute($sql, ['email' => $email])->fetch(PDO::FETCH_OBJ) ?: null;
    }

    public function updateLastLogin(int $userID): void
    {
        $sql = <<<SQL
            UPDATE users
            SET lastip_login = :ip, last_login = :now
            WHERE userid = :user_id
        SQL;

        $this->db->execute($sql, [
            'ip' => $_SERVER['REMOTE_ADDR'],
            'now' => time(),
            'user_id' => $userID,
        ]);
    }

    public function nameExists(string $name): bool
    {
        $sql = 'SELECT COUNT(*) FROM users WHERE username = :name';

        return $this->db->execute($sql, ['name' => $name])->fetchColumn() > 0;
    }

    public function emailExists(string $email): bool
    {
        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        return $this->db->execute($sql, ['email' => $email])->fetchColumn() > 0;
    }

    public function createUser(string $name, string $email, string $password): int
    {
        $salt = substr(sha1(random_bytes(256)), -8);
        $sql = <<<SQL
            INSERT INTO users (username, userpass, pass_salt, email, signedup,
                               display_pic, staffnotes, voted,user_notepad)
                VALUES (:name, :password, :salt, :email, :now, '', '', '', '')
        SQL;
        $this->db->execute($sql, [
            'name' => $name,
            'password' => md5($salt . md5($password)),
            'salt' => $salt,
            'email' => $email,
            'now' => time(),
        ]);

        $id = (int)$this->db->lastInsertId();
        $sql = <<<SQL
            INSERT INTO userstats (userid, strength, agility, guard, labour, IQ) VALUES (:id, 10, 10, 10, 10, 10)
        SQL;
        $this->db->execute($sql, [
            'id' => $id,
        ]);

        if ($id === 1) {
            $this->db->execute('UPDATE users SET user_level = 2 WHERE userid = 1');
        }

        return $id;
    }

    public function updateNotes(int $userID, string $notes): void
    {
        $sql = <<<SQL
                UPDATE users
                SET user_notepad = :notes
                WHERE userid = :user_id
            SQL;

        $this->db->execute($sql, [
            'notes' => $notes,
            'user_id' => $userID,
        ]);
    }
}
