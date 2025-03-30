<?php

namespace App\Repositories;

use App\Classes\Database;
use DI\Attribute\Inject;
use PDO;

class InventoryRepository
{
    #[Inject]
    protected Database $db;

    public function list(int $userID): array
    {
        $sql = <<<SQL
            SELECT v.inv_itemid AS item_id, i.itmname AS name, i.itmsellprice AS value, SUM(v.inv_qty) AS quantity,
                   i.armor, i.weapon, i.effect1_on + i.effect2_on + i.effect3_on AS has_effect, i.slug,
                   MIN(v.inv_id) AS inventory_id
            FROM inventory v
            LEFT JOIN items i ON i.itmid = v.inv_itemid
            WHERE v.inv_userid = :user_id AND v.inv_qty > 0
            GROUP BY v.inv_itemid
            ORDER BY i.itmname
        SQL;

        return $this->db->execute($sql, ['user_id' => $userID])->fetchAll(PDO::FETCH_OBJ);
    }

    public function give(int $userID, int $itemID, int $quantity = 1): void
    {
        $sql = <<<SQL
                UPDATE inventory
                SET inv_qty = inv_qty + :quantity
                WHERE inv_itemid = :item_id AND inv_userid = :user_id
                LIMIT 1
            SQL;
        $context = [
            'item_id' => $itemID,
            'user_id' => $userID,
            'quantity' => $quantity
        ];

        if (!$this->db->execute($sql, $context)->rowCount()) {
            $sql = <<<SQL
                    INSERT INTO inventory (inv_itemid, inv_userid, inv_qty)
                    VALUES (:item_id, :user_id, :quantity)
                SQL;

            $this->db->execute($sql, $context);
        }
    }

    public function take(int $userID, int $itemID): bool
    {
        $sql = <<<SQL
            UPDATE inventory
            SET inv_qty = inv_qty - 1
            WHERE inv_itemid = :item_id AND inv_userid = :user_id AND inv_qty > 0
            LIMIT 1
        SQL;

        return $this->db->execute($sql, ['item_id' => $itemID, 'user_id' => $userID])->rowCount() > 0;
    }
}
