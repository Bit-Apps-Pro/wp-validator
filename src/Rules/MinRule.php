<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class MinRule extends Rule
{

    private $message = "The :attribute must be at least :min characters";

    protected $requireParameters = ['min'];

    public function validate($value)
    {
        $this->checkRequiredParameter($this->requireParameters);

        $min = (int) $this->getParameter('min');

        return strlen($value) >= $min;
    }

    public function message()
    {
        return $this->message;
    }
}
