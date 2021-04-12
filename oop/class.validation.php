<?php /** @noinspection PhpIllegalPsrClassPathInspection */

class Validation
{
    /**
     * @param $var
     * @return bool
     */
    public function isString($var): bool
    {
        return is_string($var);
    }

    /**
     * @param $min
     * @param $max
     * @param $string
     * @return bool
     */
    public function isProperLength($min, $max, $string): bool
    {
        $l = strlen($string);

        return ( $l >= $min && $l <= $max);
    }


    public function isAlpha($sting)
    {
        return preg_match('/[a-zA-Z]', $sting);
    }

}