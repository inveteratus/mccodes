<?php

namespace App\Controllers;

use App\Classes\Database;
use App\Classes\View;
use DI\Attribute\Inject;
use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ExploreController
{
    #[Inject]
    protected Database $db;
    #[Inject]
    protected View $view;

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $userID = $request->getAttribute('user_id');

        $sql = <<<SQL
            SELECT u.*, c.*
            FROM users u
            LEFT JOIN cities c ON c.cityID = u.location
            WHERE u.userid = :uid
        SQL;

        $user = $this->db->execute($sql, ['uid' => $userID])->fetch(PDO::FETCH_OBJ);

        return $this->view->renderToResponse('explore', [
            'user' => $user,
        ]);
    }
}
