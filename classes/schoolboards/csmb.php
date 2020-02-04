<?php

namespace classes\SchoolBoards;

use classes\Student\Student;
use Exception;
use helpers\XmlHelper;
use Spatie\ArrayToXml\ArrayToXml;

/**
 * Class CSMB
 *
 * @package schoolBoards
 * @see SchoolBoard
 */
class CSMB extends SchoolBoard
{
    const COUNT_GRADES = 3;
    const PASS_GRADE = 9;
    
    /**
     * @param Student $student
     * @return bool
     * @throws Exception
     */
    public function canStudentPass(Student $student): bool
    {
        $countOfStudentGrades = sizeof($student->grades);
        $maxStudentGrade = max($student->grades);
        
        return (
            $countOfStudentGrades >= self::COUNT_GRADES &&
            $maxStudentGrade >= self::PASS_GRADE
        ) ? true : false;
    }
    
    /**
     * @param Student $student
     */
    public function outputStudentStatistic(Student $student)
    {
        $grades = [];
        $canPass = $student->canStudentPass();
        $canPass = xmlHelper::boolToString($canPass);
        
        foreach ($student->grades as $key => $value) {
            $grades["grade_$key"] = $value;
        }
        
        $statistic = [
            'id' => $student->id,
            'name' => $student->name,
            'grades' => $grades,
            'average' => $student->rating,
            'can_pass' => $canPass
        ];
        
        echo ArrayToXml::convert($statistic);
    }
}
