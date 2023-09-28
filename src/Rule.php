<?php

namespace BitApps\WPValidator;

use BitApps\WPValidator\Exception\RequiredParameterMissingException;

abstract class Rule
{
    private $inputDataContainer;

    private $params = [];

    private $skipRule = true;

    private $paramKeys = [];

    private $roleName;

    abstract public function validate($value);

    abstract public function message();

    public function getInputDataContainer()
    {
        return $this->inputDataContainer;
    }

    public function setInputDataContainer($inputDataContainer)
    {
        $this->inputDataContainer = $inputDataContainer;
    }

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
        return $this->paramKeys;
    }

    public function setParameterValues($paramKeys, $paramValues)
    {
        if (count($paramKeys) === count($paramValues)) {
            $this->params = array_combine($paramKeys, $paramValues);
        }
    }

    public function getParameter($key)
    {
        if (isset($this->params[$key])) {
            return $this->params[$key];
        }
        return null;
    }

    public function setRuleName($ruleName)
    {
        $this->roleName = $ruleName;
    }

    public function getRuleName()
    {
        return $this->roleName;
    }

    public function getParamValues()
    {
        return $this->params;
    }

}
