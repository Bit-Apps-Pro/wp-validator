<?php

namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class JsonRule extends Rule
{
    public function validate($value)
    {
        json_decode($value);
        return json_last_error() === JSON_ERROR_NONE;
    }
}
