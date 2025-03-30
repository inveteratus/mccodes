<?php

namespace App\Repositories;

use App\Classes\Database;
use App\Enums\EquipmentType;
use DI\Attribute\Inject;
use PDO;

class EquipmentRepository
{
    #[Inject]
    protected Database $db;

    public function list(int $userID): array
    {
        return [
            'primary' => $this->get($userID, EquipmentType::PRIMARY),
            'secondary' => $this->get($userID, EquipmentType::SECONDARY),
            'armor' => $this->get($userID, EquipmentType::ARMOR),
        ];
    }

    public function get(int $userID, EquipmentType $type): ?object
    {
        $field = $this->field($type);
        $sql = <<<SQL
            SELECT i.itmid AS id, i.itmname AS name, i.itmdesc AS description, i.weapon AS class
            FROM items i
            LEFT JOIN users u ON u.$field = i.itmid
            WHERE u.userid = :user_id
        SQL;

        return $this->db->execute($sql, ['user_id' => $userID])->fetch(PDO::FETCH_OBJ) ?: null;
    }

    public function set(int $userID, EquipmentType $type, ?int $itemID): void
    {
        $field = $this->field($type);
        $sql = <<<SQL
            UPDATE users
            SET $field = :item_id
            WHERE userid = :user_id
        SQL;

        $this->db->execute($sql, ['item_id' => $itemID, 'user_id' => $userID]);
    }

    public function clear(int $userID, EquipmentType $type): void
    {
        $this->set($userID, $type, null);
    }

    private function field(EquipmentType $type): string
    {
        return match ($type) {
            EquipmentType::PRIMARY => 'equip_primary',
            EquipmentType::SECONDARY => 'equip_secondary',
            EquipmentType::ARMOR => 'equip_armor',
        };
    }
}
