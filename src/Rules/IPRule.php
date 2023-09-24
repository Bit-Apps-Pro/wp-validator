<?php
namespace BitApps\WPValidator\Rules;

class IPRule
{
    public static function validate($field, $value)
    {
        return filter_var($value, FILTER_VALIDATE_IP) !== false;
    }
}
