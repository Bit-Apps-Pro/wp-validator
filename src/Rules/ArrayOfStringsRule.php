<?php

namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class ArrayOfStringsRule extends Rule
{
    private $message = "The :attribute every item must be string";

    public function validate($value)
    {
        $filtered = array_filter($value, 'is_string');

        return \count($filtered) === \count($value);
    }

    public function message()
    {
        return $this->message;
    }
}
