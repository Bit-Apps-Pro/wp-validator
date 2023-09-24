<?php
namespace BitApps\WPValidator\Rules;

class ArrayRule
{
    public static function validate($field, $value)
    {
        return is_array($value);
    }
}
