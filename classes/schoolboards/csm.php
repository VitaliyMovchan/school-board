<?php

namespace classes\SchoolBoards;

use classes\Student\Student;

use Exception;

/**
 * Class CSM
 *
 * @package schoolBoards
 * @see schoolBoard
 */
class CSM extends SchoolBoard
{
    const PASS_RATING = 7;
    
    /**
     * @param Student $student
     * @return bool
     * @throws Exception
     */
    public function canStudentPass(Student $student): bool
    {
        return ($student->rating >= self::PASS_RATING) ? true : false;
    }
    
    /**
     * @param Student $student
     * @return string
     */
    public function outputStudentStatistic(Student $student): string
    {
        $statistic = [
            'id' => $student->id,
            'name' => $student->name,
            'grades' => $student->grades,
            'average' => $student->rating,
            'canPass' => $student->canStudentPass()
        ];
        
        return json_encode($statistic);
    }
}
