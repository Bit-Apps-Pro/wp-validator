<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class MaxRule extends Rule
{
    protected $message = "The :attribute may not be greater than :max characters";

    protected $requireParameters = ['max'];


    public function validate($value)
    {
        $this->checkRequiredParameter($this->requireParameters);

        $max = $this->getParameter('max');

        return strlen($value) <= $max;
    }

    public function getParamKeys()
    {
        return $this->requireParameters;
    }

    public function message()
    {
        return $this->message;
    }
}
