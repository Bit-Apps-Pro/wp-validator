<?php
namespace BitApps\ValidatorSanitizer\Rules;

class IPRule
{
    public static function validate($field, $value)
    {
        return filter_var($value, FILTER_VALIDATE_IP) !== false;
    }
}
