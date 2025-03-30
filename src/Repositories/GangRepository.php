<?php

namespace App\Repositories;

use App\Classes\Database;
use DI\Attribute\Inject;
use PDO;

class GangRepository
{
    #[Inject]
    protected Database $db;

    public function get(int $gangID): ?object
    {
        $sql = <<<SQL
            SELECT gangID AS id, gangNAME AS name, gangDESC AS description, gangPREF AS prefix, gangSUFF AS suffix,
                   gangMONEY AS cash, gangCRYSTALS AS tokens, gangRESPECT AS respect, gangPRESIDENT AS president_id,
                   gangVICEPRES AS vice_id, gangs.gangCAPACITY AS capacity, gangCRIME AS crime_id,
                   gangCHOURS AS crime_house
            FROM gangs 
            WHERE gangID = :gang_id
        SQL;

        return $this->db->execute($sql, ['gang_id' => $gangID])->fetch(PDO::FETCH_OBJ) ?: null;
    }
}
