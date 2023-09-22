<?php

namespace BitApps\ValidatorSanitizer\Rules;


class AcceptedRule
{
    public static function validate($field, $value)
    {
        $accepted = ['yes', 'on', '1', 1, true];
        return in_array($value, $accepted, true);
    }
}
