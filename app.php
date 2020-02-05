<?php

use classes\http\Request;
use classes\schoolBoards\SchoolBoardHelper;
use classes\db\sqlite\StudentEntity;
use classes\db\sqlite\GradeEntity;
use classes\Student\Student;
use helpers\ArrayHelper;
use helpers\FileHelper;

/**
 * Class App
 *
 * @property Request $request
 * @property SQLite3 $sqlite
 */
class App
{
    /**
     * @var Request $request
     */
    private $request;
    
    /**
     * @var SQLite3 $sqlite
     */
    private $sqlite;
    
    /**
     * App constructor.
     */
    public function __construct()
    {
        try {
            // Check is exist school bord sql file
            if (!$isExistFile = fileHelper::isExistFile(DB_FILE)) {
                throw new Exception(' Sql file is not exist');
            }
            
            $this->request = new Request();
            $this->sqlite = new SQLite3(DB_FILE);
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }
    
    /**
     * This method run application
     */
    public function run()
    {
        try {
            $studentID = (int)$this->findStudentId();
            if ($studentID) {
                $studentData = $this->getStudentData($studentID);
                $student = $this->getStudent($studentData);
                $student->outputStudentStatistic();
            } else {
                throw new Exception('Student ID not found');
            }
        } catch (Exception $e) {
            exit($e->getMessage());
        }
        
    }
    
    /**
     * @return string
     */
    private function findStudentId(): string
    {
        $paths = $this->request->parseUri();
        $params = $this->request->parseQuery();
        
        return $paths[2] ?? $params['student'] ?? '';
    }
    
    /**
     * @param int $studentID
     * @return array
     * @throws Exception
     */
    private function getStudentData(int $studentID)
    {
        $studentEntity = new studentEntity($this->sqlite);
        $studentEntityData = $studentEntity->getStudentByID($studentID);
        
        if (empty($studentEntityData)) {
            exit('Student not find');
        }
        
        $studentGradeEntity = new gradeEntity($this->sqlite);
        $studentGradeEntityData = $studentGradeEntity->getGradesByStudentID($studentID);
    
        $studentEntityData['grades'] = $studentGradeEntityData;
       
        return $studentEntityData;
    }
    
    /**
     * @param array $studentData
     * @return Student
     * @throws Exception
     */
    private function getStudent(array $studentData): Student
    {
        $schoolBoard = schoolBoardHelper::getSchoolBoardByType(
            $studentData['school_board'] ?? 0
        );
        
        if (is_null($schoolBoard)) {
            throw new Exception('School board required');
        }
    
        $studentGrades = ArrayHelper::arrayMapByKey(
            $studentData['grades'] ?? [],
            'grade');
        
        return new Student(
            $studentData['id'] ?? 0,
            $studentData['name'] ?? '',
            $studentGrades,
            $schoolBoard
        );
    }
}
