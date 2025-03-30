<?php

namespace App\Controllers;

use App\Classes\View;
use App\Repositories\CityRepository;
use App\Repositories\GangRepository;
use App\Repositories\HouseRepository;
use App\Repositories\JobRepository;
use App\Repositories\UserRepository;
use DI\Attribute\Inject;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController
{
    #[Inject]
    protected CityRepository $cities;

    #[Inject]
    protected GangRepository $gangs;

    #[Inject]
    protected HouseRepository $houses;

    #[Inject]
    protected JobRepository $jobs;

    #[Inject]
    protected UserRepository $users;

    #[Inject]
    protected View $view;

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $userID = $request->getAttribute('user_id');
        $user = $this->users->get($userID);

        return $this->view->renderToResponse('home', [
            'user' => $user,
            'house' => $this->houses->get($user->maxwill),
            'city' => $this->cities->get($user->location),
            'gang' => $user->gang ? $this->gangs->get($user->gang) : null,
            'job' => $user->jobrank ? $this->jobs->get($user->jobrank) : null,
        ]);
    }

    public function updateNotes(ServerRequestInterface $request): ResponseInterface
    {
        $params = (array)$request->getParsedBody();

        if (array_key_exists('notes', $params) && is_string($params['notes'])) {
            $this->users->updateNotes($request->getAttribute('user_id'), $params['notes']);
        }

        return redirect('/home');
    }
}
