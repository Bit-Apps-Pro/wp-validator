<?php
namespace BitApps\ValidatorSanitizer\Rules;

class DateRule
{
    public static function validate($field, $value)
    {
        return strtotime($value) !== false;
    }
}
