<?php
namespace BitApps\WPValidator\Rules;

class LowercaseRule
{
    public static function validate($field, $value)
    {
        return $value === strtolower($value);
    }
}
