<?php

namespace classes\db\sqlite;

use Exception;
use SQLite3;
use SQLite3Result;

/**
 * Class entity
 *
 * @package classes\db\sqlite
 *
 * @property SQLite3 $sqlite
 */
abstract class Entity
{
    /**
     * @var SQLite3 $sqlite
     */
    protected $sqlite;
    
    /**
     * entity constructor.
     *
     * @param SQLite3 $sqlte
     */
    public function __construct(SQLite3 $sqlte)
    {
        $this->sqlite = $sqlte;
    }
    
    /**
     * @param string $query
     * @return SQLite3Result
     * @throws Exception
     */
    protected function executeQuery(string $query): SQLite3Result
    {
        $response = $this->sqlite->query($query);
        
        if (!$response) {
            throw new Exception('SQLite error : ' . $this->sqlite->lastErrorMsg());
        }
        
        return $response;
    }
    
    /**
     * @param SQLite3Result $result
     * @return array
     */
    protected function fetchResult(SQLite3Result $result): array
    {
        $rows = [];
        
        while ($row = $result->fetchArray()) {
            array_push($rows, $row);
        }
        
        return $rows;
    }
}
