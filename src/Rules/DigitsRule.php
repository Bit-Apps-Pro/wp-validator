<?php
namespace BitApps\ValidatorSanitizer\Rules;

class DigitsRule
{
    public static function validate($field, $value)
    {
        return ctype_digit($value);
    }
}
