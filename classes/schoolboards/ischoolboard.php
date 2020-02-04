<?php

use classes\Student\Student;

/**
 * Interface iSchoolBoard
 */
interface iSchoolBoard
{
    public function canStudentPass(Student $student);
    
    public function outputStudentStatistic(Student $student);
    
}
