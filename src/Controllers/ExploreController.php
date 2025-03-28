<?php

namespace App\Controllers;

use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ExploreController extends Controller
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $uid = $request->getAttribute('uid');

        $sql = <<<SQL
            SELECT u.*, c.*
            FROM users u
            LEFT JOIN cities c ON c.cityID = u.location
            WHERE u.userid = :uid
        SQL;

        $user = $this->db->execute($sql, ['uid' => $uid])->fetch(PDO::FETCH_OBJ);

        return $this->view->renderToResponse('explore', [
            'user' => $user,
        ]);
    }
}
