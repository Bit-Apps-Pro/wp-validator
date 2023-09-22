<?php
namespace BitApps\ValidatorSanitizer\Rules;

class MaxRule
{
    public static function validate($field, $value, $max)
    {
        return strlen($value) <= $max;
    }
}
