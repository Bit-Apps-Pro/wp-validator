<?php
namespace BitApps\ValidatorSanitizer\Rules;

class IP4Rule
{
    public static function validate($field, $value)
    {
        return filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false;
    }
}
