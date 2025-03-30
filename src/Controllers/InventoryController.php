<?php

namespace App\Controllers;

use App\Classes\View;
use App\Enums\EquipmentType;
use App\Repositories\EquipmentRepository;
use App\Repositories\InventoryRepository;
use App\Repositories\ItemRepository;
use App\Repositories\UserRepository;
use DI\Attribute\Inject;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class InventoryController
{
    #[Inject]
    protected EquipmentRepository $equipment;

    #[Inject]
    protected InventoryRepository $inventory;

    #[Inject]
    protected ItemRepository $items;

    #[Inject]
    protected UserRepository $users;

    #[Inject]
    protected View $view;

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $userID = $request->getAttribute('user_id');

        return $this->view->renderToResponse('inventory', [
            'user' => $this->users->get($userID),
            'inventory' => $this->inventory->list($userID),
            'equipment' => $this->equipment->list($userID),
        ]);
    }

    public function wear(ServerRequestInterface $request, int $itemID): ResponseInterface
    {
        $userID = $request->getAttribute('user_id');
        $item = $this->items->get($itemID);

        if ($item && $item->armor && $this->inventory->take($userID, $itemID)) {
            $current = $this->equipment->get($userID, EquipmentType::ARMOR);
            $this->equipment->set($userID, EquipmentType::ARMOR, $itemID);

            if ($current) {
                $this->inventory->give($userID, $itemID);
            }
        }

        return redirect('/inventory');
    }

    public function wield(ServerRequestInterface $request, int $itemID): ResponseInterface
    {
        $userID = $request->getAttribute('user_id');
        $item = $this->items->get($itemID);
        $primary = $this->equipment->get($userID, EquipmentType::PRIMARY);
        $secondary = $this->equipment->get($userID, EquipmentType::SECONDARY);

        if ($item && $item->weapon && (!$primary || !$secondary) && $this->inventory->take($userID, $itemID)) {
            if (!$primary) {
                $this->equipment->set($userID, EquipmentType::PRIMARY, $itemID);
            }
            else {
                $this->equipment->set($userID, EquipmentType::SECONDARY, $itemID);
            }
        }

        return redirect('/inventory');
    }

    public function remove(ServerRequestInterface $request, string $from): ResponseInterface
    {
        $userID = $request->getAttribute('user_id');
        $type = EquipmentType::from($from);

        $current = $this->equipment->get($userID, $type);
        $this->equipment->clear($userID, $type);

        if ($current) {
            $this->inventory->give($userID, $current->id);
        }

        return redirect('/inventory');
    }
}
