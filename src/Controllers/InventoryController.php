<?php

namespace App\Controllers;

use Fig\Http\Message\StatusCodeInterface;
use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Psr7\Factory\ResponseFactory;

class InventoryController extends Controller
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $userID = $request->getAttribute('uid');
        $user = $this->db->execute('SELECT * FROM users WHERE userid = :user_id', ['user_id' => $userID])
            ->fetch(PDO::FETCH_OBJ);

        $sql = <<<SQL
            SELECT v.inv_itemid AS item_id, i.itmname AS name, i.itmsellprice AS value, SUM(v.inv_qty) AS quantity,
                   i.armor, i.weapon, i.effect1_on + i.effect2_on + i.effect3_on AS has_effect
            FROM inventory v
            LEFT JOIN items i ON i.itmid = v.inv_itemid
            WHERE v.inv_userid = :user_id AND v.inv_qty > 0
            GROUP BY v.inv_itemid
            ORDER BY i.itmname
        SQL;
        $inventory = $this->db->execute($sql, ['user_id' => $userID])->fetchAll(PDO::FETCH_OBJ);

        $sql = <<<SQL
            SELECT itmid, itmname
            FROM items
            WHERE itmid = :primary OR itmid = :secondary OR itmid = :armor
        SQL;
        $equipment = $this->db->execute($sql, [
            'primary' => $user->equip_primary,
            'secondary' => $user->equip_secondary,
            'armor' => $user->equip_armor,
        ])->fetchAll(PDO::FETCH_KEY_PAIR);

        return $this->view->renderToResponse('inventory', [
            'user' => $user,
            'inventory' => $inventory,
            'equipment' => $equipment,
        ]);
    }

    public function unequip(ServerRequestInterface $request): ResponseInterface
    {
        $userID = $request->getAttribute('uid');
        $what = $this->post($request, 'from');
        $sql = <<<SQL
            SELECT equip_primary AS `primary`, equip_secondary AS secondary, equip_armor AS armor
            FROM users
            WHERE userid = :userid
        SQL;
        $old = $this->db->execute($sql, ['userid' => $userID])->fetch(PDO::FETCH_OBJ);

        if ((($what === 'primary') || ($what === 'secondary') || ($what === 'armor')) && ($old->{$what})) {
            $this->addItemToInventory($userID, $old->{$what});
            $this->db->execute("UPDATE users SET equip_{$what} = 0 WHERE userid = :user_id", ['user_id' => $userID]);
        }

        return (new ResponseFactory())
            ->createResponse(StatusCodeInterface::STATUS_FOUND)
            ->withHeader('Location', '/inventory.php');
    }

    public function equip(ServerRequestInterface $request): ResponseInterface
    {
        $userID = $request->getAttribute('uid');

        $itemID = $this->post($request, 'item_id');
        if (ctype_digit($itemID) && ($itemID > 0)) {
            $sql = <<<SQL
                SELECT v.inv_itemid AS item_id, i.itmname AS name, SUM(v.inv_qty) AS quantity, i.armor, i.weapon
                FROM inventory v
                LEFT JOIN items i ON i.itmid = v.inv_itemid
                WHERE v.inv_userid = :user_id AND v.inv_itemid = :item_id
                GROUP BY v.inv_itemid;
            SQL;
            $item = $this->db->execute($sql, ['user_id' => $userID, 'item_id' => $itemID])
                ->fetch(PDO::FETCH_OBJ) ?: null;

            if ($item && ($item->quantity > 0)) {
                if ($item->armor) {
                    $this->equipArmor($userID, $itemID);
                } else if ($item->weapon) {
                    $this->equipWeapon($userID, $itemID);
                }
            }
        }

        return (new ResponseFactory())
            ->createResponse(StatusCodeInterface::STATUS_FOUND)
            ->withHeader('Location', '/inventory.php');
    }

    private function equipArmor(int $userID, int $itemID): void
    {
        $sql = 'SELECT equip_armor FROM users WHERE userid = :user_id';
        $oldItemID = $this->db->execute($sql, ['user_id' => $userID])->fetchColumn();

        if ($this->removeItemFromInventory($userID, $itemID)) {
            $sql = <<<SQL
                UPDATE users
                SET equip_armor = :item_id
                WHERE userid = :user_id
            SQL;
            $this->db->execute($sql, ['item_id' => $itemID, 'user_id' => $userID]);

            if ($oldItemID > 0) {
                $this->addItemToInventory($userID, $oldItemID);
            }

        }
    }

    private function equipWeapon(int $userID, int $itemID): void
    {
        $sql = 'SELECT equip_primary AS `primary`, equip_secondary AS secondary FROM users WHERE userid = :user_id';
        $old = $this->db->execute($sql, ['user_id' => $userID])->fetch(PDO::FETCH_OBJ);

        if (!$old->primary) {
            if ($this->removeItemFromInventory($userID, $itemID)) {
                $this->db->execute('UPDATE users SET equip_primary = :item_id WHERE userid = :user_id', [
                    'item_id' => $itemID,
                    'user_id' => $userID,
                ]);
            }
        } elseif (!$old->secondary) {
            if ($this->removeItemFromInventory($userID, $itemID)) {
                $this->db->execute('UPDATE users SET equip_secondary = :item_id WHERE userid = :user_id', [
                    'item_id' => $itemID,
                    'user_id' => $userID,
                ]);
            }
        }
    }

    private function removeItemFromInventory(int $userID, int $itemID): bool
    {
        $sql = <<<SQL
            UPDATE inventory
            SET inv_qty = inv_qty - 1
            WHERE inv_itemid = :item_id AND inv_userid = :user_id AND inv_qty > 0
            LIMIT 1
        SQL;

        return $this->db->execute($sql, ['item_id' => $itemID, 'user_id' => $userID])->rowCount() > 0;
    }

    private function addItemToInventory(int $userID, int $itemID): void
    {
        $sql = <<<SQL
                UPDATE inventory
                SET inv_qty = inv_qty + 1
                WHERE inv_itemid = :item_id AND inv_userid = :user_id
                LIMIT 1
            SQL;

        if (!$this->db->execute($sql, ['item_id' => $itemID, 'user_id' => $userID])->rowCount()) {
            $sql = <<<SQL
                    INSERT INTO inventory (inv_itemid, inv_userid, inv_qty)
                    VALUES (:item_id, :user_id, 1)
                SQL;

            $this->db->execute($sql, ['item_id' => $itemID, 'user_id' => $userID]);
        }
    }

    private function post(ServerRequestInterface $request, string $field): string
    {
        $params = (array)$request->getParsedBody();

        return array_key_exists($field, $params) && is_string($params[$field])
            ? trim($params[$field])
            : '0';
    }
}
