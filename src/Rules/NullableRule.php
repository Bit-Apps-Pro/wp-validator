<?php
namespace BitApps\ValidatorSanitizer\Rules;

class NullableRule
{
    public static function validate($field, $value)
    {
        return true; // No validation needed, always passes.
    }
}
