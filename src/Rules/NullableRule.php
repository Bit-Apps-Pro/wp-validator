<?php
namespace BitApps\WPValidator\Rules;

class NullableRule
{
    public static function validate($field, $value)
    {
        return true;
    }

    public function skipRule()
    {
        return false;
    }
}
