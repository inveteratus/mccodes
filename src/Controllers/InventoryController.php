<?php

namespace App\Controllers;

use App\Classes\Database;
use App\Classes\View;
use App\Repositories\InventoryRepository;
use DI\Attribute\Inject;
use Fig\Http\Message\StatusCodeInterface;
use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Psr7\Factory\ResponseFactory;

class InventoryController
{
    #[Inject]
    protected Database $db;
    #[Inject]
    protected View $view;
    #[Inject]
    protected InventoryRepository $inventory;

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $userID = $request->getAttribute('user_id');

        $user = $this->db->execute('SELECT * FROM users WHERE userid = :user_id', ['user_id' => $userID])
            ->fetch(PDO::FETCH_OBJ);

        $inventory = $this->inventory->getAll($userID);

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

    public function wear(ServerRequestInterface $request, int $itemID): ResponseInterface
    {
        $userID = $request->getAttribute('user_id');
        $sql = 'SELECT equip_armor FROM users WHERE userid = :user_id';
        $oldItem = $this->db->execute($sql, ['user_id' => $userID])->fetchColumn();

        if ($this->inventory->removeItem($userID, $itemID)) {
            $sql = 'UPDATE users SET equip_armor = :item_id WHERE userid = :user_id';
            $this->db->execute($sql, ['item_id' => $itemID, 'user_id' => $userID]);

            if ($oldItem > 0) {
                $this->inventory->addItem($userID, $oldItem);
            }
        }

        return (new ResponseFactory())
            ->createResponse(StatusCodeInterface::STATUS_FOUND)
            ->withHeader('Location', '/inventory');
    }

    public function wield(ServerRequestInterface $request, int $itemID): ResponseInterface
    {
        $userID = $request->getAttribute('user_id');
        $sql = 'SELECT equip_primary AS `primary`, equip_secondary AS secondary FROM users WHERE userid = :user_id';
        $oldItems = $this->db->execute($sql, ['user_id' => $userID])->fetch(PDO::FETCH_OBJ);

        if ($this->inventory->removeItem($userID, $itemID)) {
            if (!$oldItems->primary) {
                $sql = 'UPDATE users SET equip_primary = :item_id WHERE userid = :user_id';
                $this->db->execute($sql, ['item_id' => $itemID, 'user_id' => $userID]);
            }
            elseif (!$oldItems->secondary) {
                $sql = 'UPDATE users SET equip_secondary = :item_id WHERE userid = :user_id';
                $this->db->execute($sql, ['item_id' => $itemID, 'user_id' => $userID]);
            }
            else {
                $this->inventory->addItem($userID, $itemID);
            }
        }

        return (new ResponseFactory())
            ->createResponse(StatusCodeInterface::STATUS_FOUND)
            ->withHeader('Location', '/inventory');
    }

    public function remove(ServerRequestInterface $request, string $from): ResponseInterface
    {
        $userID = $request->getAttribute('user_id');
        $sql = "SELECT equip_{$from} FROM users WHERE userid = :userid";
        $itemID = $this->db->execute($sql, ['userid' => $userID])->fetchColumn();

        if ($itemID > 0) {
            $sql = "UPDATE users SET equip_{$from} = 0 WHERE userid = :user_id";
            $this->db->execute($sql, ['user_id' => $userID]);

            $this->inventory->addItem($userID, $itemID);
        }

        return (new ResponseFactory())
            ->createResponse(StatusCodeInterface::STATUS_FOUND)
            ->withHeader('Location', '/inventory');
    }
}
