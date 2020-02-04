<?php

namespace helpers;

/**
 * Class fileHelper
 *
 * @package helpers
 */
class FileHelper
{
    /**
     * @param string $fileName
     * @return bool
     */
    public static function isExistFile(string $fileName): bool
    {
        return (file_exists($fileName) && is_file($fileName));
    }
}
