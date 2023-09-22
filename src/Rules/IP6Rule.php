<?php
namespace BitApps\ValidatorSanitizer\Rules;

class IP6Rule
{
    public static function validate($field, $value)
    {
        return filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false;
    }
}
