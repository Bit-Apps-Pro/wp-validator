<?php

namespace BitApps\ValidatorSanitizer;

class StringRule
{
    public static function validate($field, $value)
    {
        return is_string($value);
    }
}
