<?php

namespace App\Repositories;

use App\Classes\Database;
use DI\Attribute\Inject;
use PDO;

class HouseRepository
{
    #[Inject]
    protected Database $db;

    public function get(int $capacity): ?object
    {
        $sql = <<<SQL
            SELECT hID AS id, hNAME AS name, hPRICE as cost, hWILL AS capacity
            FROM houses
            WHERE hWILL = :capacity
        SQL;

        return $this->db->execute($sql, ['capacity' => $capacity])->fetch(PDO::FETCH_OBJ) ?: null;
    }
}
