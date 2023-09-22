<?php
namespace BitApps\ValidatorSanitizer\Rules;

class BetweenRule
{
    public static function validate($field, $value, $min, $max)
    {
        $length = strlen($value);
        return $length >= $min && $length <= $max;
    }
}
