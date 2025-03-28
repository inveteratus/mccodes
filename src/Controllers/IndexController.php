<?php

namespace App\Controllers;

use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class IndexController extends Controller
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $uid = $request->getAttribute('uid');

        if ($request->getMethod() == 'POST') {
            $notes = $this->post($request, 'notes');
            if ($notes !== null) {
                $this->updateNotes($uid, $notes);
            }
        }

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

        $user = $this->db->execute($sql, ['uid' => $uid])->fetch(PDO::FETCH_OBJ);

        return $this->view->renderToResponse('index', [
            'user' => $user,
        ]);
    }

    private function post(ServerRequestInterface $request, string $field): ?string
    {
        $params = (array)$request->getParsedBody();

        return array_key_exists($field, $params) && is_string($params[$field])
            ? trim($params[$field])
            : null;
    }

    private function updateNotes(int $uid, string $notes): void
    {
        $this->db->execute('UPDATE users SET user_notepad = :notes WHERE userid = :uid', [
            'notes' => $notes,
            'uid' => $uid,
        ]);
    }
}
