<?php

namespace App\Repositories;

use App\Classes\Database;
use DI\Attribute\Inject;
use PDO;

class ItemRepository
{
    #[Inject]
    protected Database $db;

    public function get(int $itemID): ?object
    {
        $sql = <<<SQL
            SELECT itmid AS id,
                   itmname AS name,
                   itmdesc AS description,
                   itmbuyprice AS cost,
                   itmsellprice AS value,
                   itmbuyable AS can_buy,
                   IF(effect1_on, effect1, null) AS effect1,
                   IF(effect2_on, effect2, null) AS effect2,
                   IF(effect3_on, effect3, null) AS effect3,
                   weapon, 
                   armor
            FROM items
            WHERE itmid = :item_id
        SQL;

        return $this->db->execute($sql, ['item_id' => $itemID])->fetch(PDO::FETCH_OBJ) ?: null;
    }
}
