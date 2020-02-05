<?php

namespace classes\Student;

use classes\SchoolBoards\SchoolBoard;
use helpers\ArrayHelper;
use Exception;

/**
 * Class Student
 *
 * This class realize design pattern strategy
 *
 * @package classes
 *
 * @property int $id
 * @property string $name
 * @property array $grades
 * @property SchoolBoard $schoolBoard
 * @property float|int $rating
 */
class Student
{
    /**
     * @var int $id
     */
    public $id;
    /**
     * @var string $name
     */
    public $name;
    
    /**
     * @var array $grades
     */
    public $grades;
    
    /**
     * @var schoolBoard
     */
    public $schoolBoard;
    
    
    /**
     * @var float|int $rating
     */
    public $rating = 0.00;
    
    /**
     * Student constructor.
     *
     * @param int $id
     * @param string $name
     * @param array $grades
     * @param schoolBoard $schoolBoard
     *
     * @throws Exception
     */
    public function __construct(
        int $id,
        string $name,
        array $grades,
        schoolBoard $schoolBoard
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->grades = $grades;
        $this->schoolBoard = $schoolBoard;
        
        $this->validate();
        
        $this->rating = arrayHelper::getAverageValue($this->grades);
        $this->rating = round($this->rating, 2);
    }
    
    /**
     * @return bool
     */
    public function canStudentPass(): bool
    {
        return $this->schoolBoard->canStudentPass($this);
    }
    
    /**
     * Output student statistic
     */
    public function outputStudentStatistic()
    {
        echo $this->schoolBoard->outputStudentStatistic($this);
    }
    
    /**
     * @throws Exception
     */
    private function validate()
    {
        // Check count of grades in range (1,4)
        if (sizeof($this->grades) < 1 || sizeof($this->grades) > 4) {
            throw new Exception('Size of grades must be in the range');
        }
        
        // Check grade is int
        foreach ($this->grades as $grade) {
            if (!is_int($grade)) {
                throw new Exception("Grade '$grade' is not integer");
            }
        }
    }
}
