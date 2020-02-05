<?php

namespace helpers;

use Exception;

/**
 * Class arrayHelper
 * @package helpers
 */
class ArrayHelper
{
    /**
     * @param array $array
     * @return float
     * @throws Exception
     */
    public static function getAverageValue(array $array): float
    {
        // Try return average value of array
        try {
            return array_sum($array) / sizeof($array);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    /**
     * @param array $array
     * @param string $key
     * @return array
     */
    public static function arrayMapByKey(array $array, string $key)
    {
        return array_map(function ($array) use ($key) {
            return $array[$key];
        }, $array);
    }
}
