<?php

namespace helpers;

/**
 * Class xmlHelper
 * @package helpers
 */
class XmlHelper
{
    public static function boolToString(bool $value): string
    {
        return $value ? 'true' : 'false';
    }
}
