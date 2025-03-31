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

    /**
     * Handles POST /inventory/wear/{slug}
     */
    public function wear(ServerRequestInterface $request, string $slug): ResponseInterface
    {
        $userID = $request->getAttribute('user_id');
        $item = $this->items->getBySlug($slug);

        if ($item && $item->armor && $this->inventory->take($userID, $item->id)) {
            $current = $this->equipment->get($userID, EquipmentType::ARMOR);
            $this->equipment->set($userID, EquipmentType::ARMOR, $item->id);

            if ($current) {
                $this->inventory->give($userID, $item->id);
            }
        }

        return redirect('/inventory');
    }

    /**
     * Handles POST /inventory/wield/{slug}
     */
    public function wield(ServerRequestInterface $request, string $slug): ResponseInterface
    {
        $userID = $request->getAttribute('user_id');
        $item = $this->items->getBySlug($slug);
        $primary = $this->equipment->get($userID, EquipmentType::PRIMARY);
        $secondary = $this->equipment->get($userID, EquipmentType::SECONDARY);

        if ($item && $item->weapon && (!$primary || !$secondary) && $this->inventory->take($userID, $item->id)) {
            if (!$primary) {
                $this->equipment->set($userID, EquipmentType::PRIMARY, $item->id);
            }
            else {
                $this->equipment->set($userID, EquipmentType::SECONDARY, $item->id);
            }
        }

        return redirect('/inventory');
    }

    /**
     * Handles POST /inventory/remove/{from}
     * Where from is one of EquipmentType values
     */
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

    /**
     * Handles GET /inventory/describe/{slug}
     */
    public function describe(ServerRequestInterface $request, string $slug): ResponseInterface
    {
        $item = $this->items->getBySlug($slug);
        if (!$item) {
            return $this->view->renderToResponse('404');
        }

        return $this->view->renderToResponse('describe', [
            'item' => $item,
            'user' => $this->users->get($request->getAttribute('user_id')),
        ]);
    }
}
