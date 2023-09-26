<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class BetweenRule extends Rule
{

    protected $message = "The :attribute must be between :min and :max";

    protected $requireParameters = ['min', 'max'];

    public function validate($value)
    {
        $this->checkRequiredParameter($this->requireParameters);

        $min = $this->getParameter('min');
        $max = $this->getParameter('max');

        return $value >= $min && $value <= $max;
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
