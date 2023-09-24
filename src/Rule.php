<?php

namespace BitApps\WPValidator;

use BitApps\WPValidator\RequiredParameterMissingException;

abstract class Rule
{

    protected $params = [];

    protected $fillableParams = [];

    abstract public function validate();

    protected function requireParameters(array $params)
    {
        foreach ($params as $param) {
            if (!isset($this->params[$param])) {
                throw new RequiredParameterMissingException("Missing required parameter ");
            }
        }
    }
}
