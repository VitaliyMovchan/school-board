<?php

namespace classes\SchoolBoards;

/**
 * Class schoolBoardHelper
 * @package schoolBoards
 */
class SchoolBoardHelper
{
    const TYPE_CSM = 1;
    const TYPE_CSMB = 2;
    
    /**
     * @param int $type
     * @return CSM|CSMB|null
     */
    public static function getSchoolBoardByType(int $type)
    {
        switch ($type) {
            case self::TYPE_CSM:
                return new CSM();
            case self::TYPE_CSMB:
                return new CSMB();
            default:
                return null;
        }
    }
}
