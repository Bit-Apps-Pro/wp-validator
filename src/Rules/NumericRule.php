<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class NumericRule extends Rule
{
    private $message = "";

    public function validate($value)
    {
        return is_numeric($value);
    }

    public function message()
    {
        $this->message;
    }
}
