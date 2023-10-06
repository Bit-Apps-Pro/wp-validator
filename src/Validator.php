<?php

namespace BitApps\WPValidator;

use BitApps\WPValidator\Exception\RuleErrorException;

class Validator
{
    use Helpers;

    private $errorBag;

    private $inputContainer;

    public function make($data, $ruleFields, $customMessages = null, $attributeLabels = null)
    {
        $this->inputContainer = new InputDataContainer($data);

        $this->errorBag = new ErrorBag();

        foreach ($ruleFields as $field => $rules) {
            if (isset($data[$field])) {

                $attributeLabel = $field;

                if (isset($attributeLabels[$field])) {
                    $attributeLabel = $attributeLabels[$field];
                }

                $this->inputContainer->setAttributeKey($field);

                $this->inputContainer->setAttributeLabel($attributeLabel);

                $value = $this->inputContainer->getAttributeValue();

                foreach ($rules as $ruleName) {

                    if ($ruleName == 'nullable' && $this->isEmpty($value)) {
                        break;
                    }

                    if (is_subclass_of($ruleName, Rule::class)) {
                        $ruleClass = \is_object($ruleName) ? $ruleName : new $ruleName();
                    } else {
                        list($ruleName, $paramValues) = $this->parseRule($ruleName);
                        $ruleClass = $this->resolveRule($ruleName);
                    }

                    $ruleClass->setInputDataContainer($this->inputContainer);
                    $ruleClass->setRuleName($ruleName);

                    if (!empty($paramValues)) {
                        $ruleClass->setParameterValues($ruleClass->getParamKeys(), $paramValues);
                    }

                    $isValidated = $ruleClass->validate($this->inputContainer->getAttributeValue());

                    if (!$isValidated) {
                        $this->errorBag->addError($ruleClass, $customMessages);
                        break;
                    }

                }
            }
        }

        return $this;
    }

    public function fails()
    {
        return !empty($this->errorBag->getErrors()) ? true : false;
    }

    public function errors()
    {
        return $this->errorBag->getErrors();
    }

    private function resolveRule($ruleName)
    {
        if (is_string($ruleName)) {
            $ruleClass = "BitApps\WPValidator\\Rules\\" . str_replace(' ', '', ucwords(str_replace('_', ' ', $ruleName))) . 'Rule';

            if (!class_exists($ruleClass)) {
                throw new RuleErrorException("Unsupported validation rule: $ruleName");
            }

            return new $ruleClass;

        }
    }

    private function parseRule($rule)
    {
        $exp = explode(':', $rule, 2);
        $ruleName = $exp[0];
        $params = [];

        if (isset($exp[1])) {
            $params = explode(',', $exp[1]);
        }

        return [$ruleName, $params];

    }

}
