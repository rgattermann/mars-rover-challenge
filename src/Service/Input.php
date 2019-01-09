<?php

namespace MarsRover\Service;

class Input
{
    const CMD_SEPARATOR = ' ';

    /**
     * @param array $inputArray
     * @return bool
     */
    public static function isDigit(array $inputArray) : bool
    {
        return (ctype_digit($inputArray[0]) && ctype_digit($inputArray[1]));
    }

    /**
     * @param string $input
     * @return array
     */
    public static function toArray(string $input) : array
    {
        return explode(self::CMD_SEPARATOR, trim($input));
    }
}
