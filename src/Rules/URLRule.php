<?php
namespace BitApps\WPValidator\Rules;

class URLRule
{
    public static function validate($field, $value)
    {
        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }
}
