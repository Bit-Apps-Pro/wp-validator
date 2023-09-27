<?php

namespace BitApps\WPValidator;

use BitApps\WPValidator\Exception\RequiredParameterMissingException;

abstract class Rule
{

    protected $params = [];

    protected $skipRule = true;

    protected $paramKeys = [];

    abstract public function validate($value);

    abstract public function message();

    protected function checkRequiredParameter($params)
    {
        foreach ($params as $param) {
            if (!isset($this->params[$param])) {
                throw new RequiredParameterMissingException("An error occurred due to a missing parameter.");
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

    public function setParameterValues($paramKeys, $paramValues)
    {
        if (count($paramKeys) === count($paramValues)) {
            $this->params = array_combine($paramKeys, $paramValues);
            return $this;
        }

        // throw new Exception('missMatch params');
    }

    public function getParameter($key)
    {
        if (isset($this->params[$key])) {
            return $this->params[$key];
        }
        return null;
    }

}
