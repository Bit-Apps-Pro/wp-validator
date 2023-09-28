<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class RequiredRule extends Rule
{

    private $message = 'The :attribute field is required';

    public function validate($value)
    {
        return !empty($value);
    }

    public function message()
    {
        return $this->message;
    }
}
