<?php

namespace App\Controllers;

use App\Classes\View;
use App\Repositories\CityRepository;
use App\Repositories\UserRepository;
use DI\Attribute\Inject;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ExploreController
{
    #[Inject]
    protected CityRepository $cities;

    #[Inject]
    protected UserRepository $users;

    #[Inject]
    protected View $view;

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $userID = $request->getAttribute('user_id');

        return $this->view->renderToResponse('explore', [
            'user' => $this->users->get($userID),
            'city' => $this->cities->get($userID),
        ]);
    }
}
