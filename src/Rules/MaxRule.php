<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class MaxRule extends Rule
{
    protected $message = "The :attribute must not exceed a specified maximum :max.";

    protected $params = ['max'];

    public function validate($value, $field = null, $params)
    {
        $max = $params[0];
        return strlen($value) <= $max;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function message()
    {
        return $this->message;
    }
}
