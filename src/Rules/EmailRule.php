<?php
namespace BitApps\WPValidator\Rules;

class EmailRule
{
    public static function validate($field, $value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}
