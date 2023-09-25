<?php

namespace BitApps\WPValidator;

use BitApps\WPValidator\RequiredParameterMissingException;

abstract class Rule
{

    protected $params = [];

    protected $skipRule = true;

    // protected $fillableParams = [];

    abstract public function validate($value, $field = null, $params);

    protected function requireParameters(array $params)
    {
        foreach ($params as $param) {
            if (!isset($this->params[$param])) {
                throw new RequiredParameterMissingException("Missing required parameter ");
            }
        }
    }

    public function skipRule()
    {
        return $this->skipRule;
    }

    public function getParams()
    {
        return $this->params;
    }
}
