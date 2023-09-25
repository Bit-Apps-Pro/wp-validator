<?php

namespace BitApps\WPValidator;

use BitApps\WPValidator\RequiredParameterMissingException;

abstract class Rule
{

    protected $params = [];

    protected $skipRule = true;

    abstract public function validate($value);

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

    public function setParameters($params)
    {
        $this->params = array_merge($this->params, $params);
        return $this;
    }
}
