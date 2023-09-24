<?php
namespace BitApps\WPValidator\Rules;

class DateRule
{
    public static function validate($field, $value)
    {
        return strtotime($value) !== false;
    }
}
