<?php

namespace App\Controllers;

use App\Classes\View;
use App\Repositories\UserRepository;
use DI\Attribute\Inject;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class BankController
{
    #[Inject]
    protected UserRepository $users;

    #[Inject]
    protected View $view;

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $userID = $request->getAttribute('user_id');
        $user = $this->users->get($userID);

        return $this->view->renderToResponse('bank', [
            'user' => $user,
            'deposit' => $this->buttons($user->money, $user->level),
            'withdraw' => $this->buttons($user->bankmoney, $user->level),
        ]);
    }

    public function deposit(ServerRequestInterface $request): ResponseInterface
    {
        $userID = $request->getAttribute('user_id');
        $user = $this->users->get($userID);
        $buttons = $this->buttons($user->money, $user->level);
        $params = (array)$request->getParsedBody();
        $amount = $params['amount'] ?? null;

        if (ctype_digit($amount) && in_array((int)$amount, $buttons)) {
            $this->users->deposit($userID, $amount);
        }

        return redirect('/bank');
    }

    public function withdraw(ServerRequestInterface $request): ResponseInterface
    {
        $userID = $request->getAttribute('user_id');
        $user = $this->users->get($userID);
        $buttons = $this->buttons($user->bankmoney, $user->level);
        $params = (array)$request->getParsedBody();
        $amount = $params['amount'] ?? null;

        if (ctype_digit($amount) && in_array((int)$amount, $buttons)) {
            $this->users->withdraw($userID, $amount);
        }

        return redirect('/bank');
    }

    private function buttons(int $amount, int $level): array
    {
        $factor1 = (floor(($level - 1) / 5) % 2) * 4 + 1;
        $factor2 = 10 ** (floor(($level - 1) / 10) + 2);
        $result = [];
        $button = $factor1 * $factor2;

        while ($button <= $amount) {
            $result[] = $button;
            if (count($result) > 6) {
                array_shift($result);
            }
            $button *= str_starts_with((string) $button, '1') ? 5 : 2;
        }

        return $result;
    }
}
