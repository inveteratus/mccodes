<?php

namespace App\Repositories;

use App\Classes\Database;
use DI\Attribute\Inject;
use PDO;

class JobRepository
{
    #[Inject]
    protected Database $db;

    public function get(int $jobID): ?object
    {
        $sql = <<<SQL
            SELECT jr.jrID AS id, j.jNAME AS company, jr.jrNAME AS position, jr.jrSTRN AS strength_reqd,
                   jr.jrLABOURN AS labour_reqd, jr.jrIQN AS intelligence_reqd, jr.jrSTRG AS strength_gain, 
                   jr.jrLABOURG AS labour_gain, jr.jrIQG AS intelligence_gain, jr.jrPAY AS pay
            FROM jobranks jr
            LEFT JOIN jobs j ON j.jID = jr.jrJOB
            WHERE jr.jrID = :job_id
        SQL;

        return $this->db->execute($sql, ['job_id' => $jobID])->fetch(PDO::FETCH_OBJ) ?: null;
    }
}
