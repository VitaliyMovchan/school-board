<?php

namespace classes\db\sqlite;

use Exception;

/**
 * Class studentEntity
 *
 * @package classes\db\sqlite
 */
class StudentEntity extends entity
{
    /**
     * @param int $studentID
     * @return array
     * @throws Exception
     */
    public function getStudentByID(int $studentID): array
    {
        $query = "SELECT
                `id`, `name`, `school_board`
            FROM
                students
            WHERE
                id = $studentID
            ";
        
        $result = $this->executeQuery($query);
        
        return $this->fetchResult($result)[0];
    }
}
