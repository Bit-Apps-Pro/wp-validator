<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class MinRule extends Rule
{

    protected $requireParameters = ['min'];

    public function validate($value)
    {

        $this->checkRequiredParameter($this->requireParameters);

        $min = $this->getParameter('min');

        return strlen($value) >= $min;
    }
}
