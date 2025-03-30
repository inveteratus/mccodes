<?php

namespace App\Repositories;

use App\Classes\Database;
use DI\Attribute\Inject;
use PDO;

class CityRepository
{
    #[Inject]
    protected Database $db;

    public function get(int $cityID): ?object
    {
        $sql = <<<SQL
            SELECT cityid AS id, cityname AS name, citydesc AS description
            FROM cities
            WHERE cityid = :city_id
        SQL;

        return $this->db->execute($sql, ['city_id' => $cityID])->fetch(PDO::FETCH_OBJ) ?: null;
    }
}
