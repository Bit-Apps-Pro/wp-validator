<?php

namespace BitApps\WPValidator;

use BitApps\WPValidator\RequiredParameterMissingException;
use Exception;

abstract class Rule
{

    protected $params = [];

    protected $skipRule = true;

    protected $paramKeys = [];

    abstract public function validate($value);

    protected function checkRequiredParameter($params)
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

    public function getParamKeys()
    {
        $this->paramKeys;
    }

    public function setParameterValues($paramValues, $paramKeys)
    {
        if (count($paramKeys) === count($paramValues)) {
            $this->params = array_combine($paramKeys, $paramValues);
            return $this;
        }

        throw new Exception('missMatch params');
    }

    public function getParameter($key)
    {
        if (isset($this->params[$key])) {
            return $this->params[$key];
        }
        return null;
    }

}
