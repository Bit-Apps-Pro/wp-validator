<?php
namespace BitApps\ValidatorSanitizer\Rules;

class MinRule
{
    public static function validate($field, $value, $min)
    {
        return strlen($value) >= $min;
    }
}
