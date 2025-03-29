<?php

namespace App\Controllers;

use App\Classes\Database;
use App\Classes\View;
use DI\Attribute\Inject;
use Fig\Http\Message\StatusCodeInterface;
use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Psr7\Factory\ResponseFactory;

class HomeController
{
    #[Inject]
    protected Database $db;
    #[Inject]
    protected View $view;

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $userID = $request->getAttribute('user_id');

        $sql = <<<SQL
            SELECT u.*, us.*, j.*, jr.*, h.*, g.*, c.*
            FROM users u
            LEFT JOIN userstats us USING (userid)
            LEFT JOIN jobranks jr ON jr.jrID = u.jobrank
            LEFT JOIN jobs j ON j.jID = jr.jrJOB
            LEFT JOIN houses h ON h.hWILL = u.maxwill
            LEFT JOIN gangs g ON g.gangID = u.gang
            LEFT JOIN cities c ON c.cityID = u.location
            WHERE u.userid = :uid
        SQL;

        $user = $this->db->execute($sql, ['uid' => $userID])->fetch(PDO::FETCH_OBJ);

        return $this->view->renderToResponse('home', [
            'user' => $user,
        ]);
    }

    public function updateNotes(ServerRequestInterface $request): ResponseInterface
    {
        $params = (array)$request->getParsedBody();

        if (array_key_exists('notes', $params) && is_string($params['notes'])) {
            $sql = <<<SQL
                UPDATE users
                SET user_notepad = :notes
                WHERE userid = :user_id
            SQL;

            $this->db->execute($sql, [
                'notes' => $params['notes'],
                'user_id' => $request->getAttribute('user_id'),
            ]);
        }

        return (new ResponseFactory())
            ->createResponse(StatusCodeInterface::STATUS_FOUND)
            ->withHeader('Location', '/home');
    }
}
