<?php

namespace classes\SchoolBoards;

use classes\Student\Student;

/**
 * Class schoolBoard
 *
 * This class realize This class realize abstract factory
 *
 * @package schoolBoards
 * @see iSchoolBoard
 */
abstract class SchoolBoard
{
    abstract function canStudentPass(Student $student);
    
    abstract function outputStudentStatistic(Student $student);
}
