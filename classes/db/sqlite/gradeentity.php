<?php

namespace classes\db\sqlite;

use Exception;

/**
 * Class studentEntity
 *
 * @package classes\db\sqlite
 */
class GradeEntity extends Entity
{
    /**
     * @param int $studentID
     * @return array
     * @throws Exception
     */
    public function getGradesByStudentID(int $studentID): array
    {
        
        $query = "SELECT
                `grade`
            FROM
                grades
            WHERE
                student_id = $studentID
            ";
        
        $result = $this->executeQuery($query);
        
        return $this->fetchResult($result);
    }
}
