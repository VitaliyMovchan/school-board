<?php

namespace classes\SchoolBoards;

use classes\Student\Student;
use iSchoolBoard;

/**
 * Class schoolBoard
 *
 * @package schoolBoards
 * @see iSchoolBoard
 */
abstract class SchoolBoard implements iSchoolBoard
{
    abstract function canStudentPass(Student $student);
    
    abstract function outputStudentStatistic(Student $student);
}
