<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class DigitsRule extends Rule
{
    private $message = "The :attribute must be :digits digits";

    private $requireParameters = ['digits'];

    public function validate($value)
    {
        $this->checkRequiredParameter($this->requireParameters);

        $digitCount = (int) $this->getParameter('digits') ? 0 : 0;

        return !preg_match('/[^0-9]/', $value) && strlen((string) $value) === $digitCount;

    }

    public function getParamKeys()
    {
        return $this->requireParameters;
    }

    public function message()
    {
        $this->message;
    }
}
