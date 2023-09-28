<?php

namespace BitApps\WPValidator;

class Validator
{
    protected $data;
    protected $rules = [];
    protected $errors = [];
    protected $errorBag;
    protected $customMessage;

    protected function getValue($field)
    {
        $keys = explode('.', $field);
        $data = $this->data;

        while ($keys) {
            $key = array_shift($keys);

            if (isset($data[$key])) {
                $data = $data[$key];
            }
        }
        return $data;

    }

    public function parseRule($rule)
    {

        $exp = explode(':', $rule, 2);

        $ruleName = $exp[0];
        $params = [];

        if (isset($exp[1])) {
            $params = explode(',', $exp[1]);
        }

        return [$ruleName, $params];

    }

    public function make($data, $ruleFields, $customMessages = null, $attributeLabels = null)
    {
        $inputContainer = new InputDataContainer($data);

        $this->errorBag = new ErrorBag();

        foreach ($ruleFields as $field => $rules) {
            $attributeLabel = $field;

            $value = $this->getValue($field);

            if (isset($attributeLabels[$field])) {
                $attributeLabel = $attributeLabels[$field];
            }

            $inputContainer->setAttributeKey($field);

            $inputContainer->setAttributeLabel($attributeLabel);

            foreach ($rules as $ruleName) {

                list($ruleName, $paramValues) = $this->parseRule($ruleName, $inputContainer);
                $ruleClass = $this->resolveRule($ruleName);
                $ruleClass->setInputDataContainer($inputContainer);
                $ruleClass->setRuleName($ruleName);

                if (!empty($paramValues)) {
                    $ruleClass->setParameterValues($ruleClass->getParamKeys(), $paramValues);
                }

                $isValidated = $ruleClass->validate($inputContainer->getAttributeValue());

                if (!$isValidated && $ruleClass->skipRule()) {
                    $this->errorBag->addError($ruleClass, $customMessages);
                    break;
                }

            }
        }

    }

    public function fails()
    {
        return !empty($this->errors) ? true : false;
    }

    public function errors()
    {
        return $this->errorBag->getErrors();
    }

    protected function resolveRule($ruleName)
    {
        if (is_string($ruleName)) {
            $ruleClass = "BitApps\WPValidator\\Rules\\" . str_replace(' ', '', ucwords(str_replace('_', ' ', $ruleName))) . 'Rule';
            
            if (!class_exists($ruleClass)) {
                throw new RuleErrorException("Unsupported validation rule: $ruleName");
            }

            return new $ruleClass;

        } else if (is_subclass_of($ruleName, Rule::class)) {

            $customRuleClass = \is_object($ruleName) ? $ruleName : new $ruleName();
            return $customRuleClass;

        }

    }

}

// $validator = (new Validator)->make($requestData, $rules, $customMessages, $attributeLabel);

//File Create with request
//old package rules feature

#current rules in boiler plate
// Required
// Numeric
// Integer
// Ip
// Ipv4
// Ipv6
// MacAddress
// Json
// Array
// ArrayOfString
// Email
// URL
// String
// Date
// Min
// Max
// Nullable
// Boolean
// Accepted
// Timezone
// Uppercase
// LowerCase
