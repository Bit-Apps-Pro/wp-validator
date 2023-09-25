<?php

namespace BitApps\WPValidator;

class Validator
{
    protected $data;
    protected $rules = [];
    protected $errors = [];
    protected $errorMessageBag;

    private $customMessages = [];
    private $attributeLabels = [];

    public function __construct()
    {
        $this->errorMessageBag = new ErrorMessageBag();
    }

    protected function getValue($field)
    {
        $keys = explode('.', $field);
        $value = $this->data;

        while ($keys) {
            $key = array_shift($keys);

            if (isset($value[$key])) {
                $value = $value[$key];
            }
        }
        return $value;

    }

    public function parseRule($rule)
    {

        $exp = explode(':', $rule, 2);

        $ruleName = $exp[0];

        if (isset($exp[1])) {
            $params = explode(',', $exp[1]);
        }

        return [$ruleName, $params];

    }

    public function make($data, $ruleFields, $customMessages = null, $attributeLabels = null)
    {
        $this->data = $data;
        $this->errorMessageBag->customMessages = $customMessages;

        foreach ($ruleFields as $field => $rules) {
            $attributeLabel = $field;

            $value = $this->getValue($field);

            if (!empty($attributeLabels) && isset($attributeLabels[$field])) {
                $attributeLabel = $attributeLabels[$field];
            }

            foreach ($rules as $ruleName) {

                list($ruleName, $paramValues) = $this->parseRule($ruleName);

                $ruleClass = $this->resolveRule($ruleName);

                $isValidated = $ruleClass->validate($value, $field, $paramValues);

                if (!$isValidated) {
                    $message = $ruleClass->message($attributeLabel);

                    if (isset($customMessages[$field][$ruleName])) {
                        $message = $this->errorMessageBag->setCustomMessage($field, $ruleName, $attributeLabel, $paramValues, $ruleClass->getParams());
                    }

                    $this->errorMessageBag->addError($field, $ruleName, $message);
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
        return $this->errorMessageBag->getErrors();
    }

    protected function resolveRule($ruleName)
    {

        if (is_string($ruleName)) {
            $ruleClass = "BitApps\WPValidator\\Rules\\" . str_replace(' ', '', ucwords($ruleName)) . 'Rule';
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
