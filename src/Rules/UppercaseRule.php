<?php
namespace BitApps\ValidatorSanitizer\Rules;

class UppercaseRule
{
    public static function validate($field, $value)
    {
        return $value === strtoupper($value);
    }
}
