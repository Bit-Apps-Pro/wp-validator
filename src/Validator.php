<?php

namespace BitApps\WPValidator;

use BitApps\WPValidator\Exception\MethodNotFoundException;
use BitApps\WPValidator\Exception\RuleErrorException;

class Validator
{
    use Helpers, SanitizationMethods;

    private $errorBag;

    private $inputContainer;

    private $validated = [];

    public function make($data, $ruleFields, $customMessages = null, $attributeLabels = null)
    {
        $this->inputContainer = new InputDataContainer($data);

        $this->errorBag = new ErrorBag();

        foreach ($ruleFields as $field => $rules) {
            $attributeLabel = $field;

            if (isset($attributeLabels[$field])) {
                $attributeLabel = $attributeLabels[$field];
            }

            $this->inputContainer->setAttributeKey($field);

            $this->inputContainer->setAttributeLabel($attributeLabel);

            $value = $this->inputContainer->getAttributeValue();

            $this->setValidatedData($field, $data, $value);

            if (\in_array('nullable', $rules) && $this->isEmpty($value)) {
                continue;
            }

            foreach ($rules as $ruleName) {
                if (\is_string($ruleName) && strpos($ruleName, 'sanitize') !== false) {
                    $this->applyFilter($ruleName, $field, $value);

                    continue;
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

    public function validated()
    {
        return empty($this->errors()) ? $this->validated : $this->errors();
    }

    private function resolveRule($ruleName)
    {
        if (!\is_string($ruleName)) {
            throw new RuleErrorException('Rule name must be string ');
        }

        $ruleClass = __NAMESPACE__
        . '\\Rules\\'
        . str_replace(' ', '', ucwords(str_replace('_', ' ', $ruleName)))
            . 'Rule';

        if (!class_exists($ruleClass)) {
            throw new RuleErrorException(sprintf('Unsupported validation rule: %s.', $ruleName));
        }

        return new $ruleClass();
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

    private function applyFilter($sanitize, $fieldName, $value)
    {
        $data = explode('|', $sanitize);

        $sanitizeName = isset($data[0]) ? explode(':', $data[0]) : [];
        $params = isset($data[1]) ? explode(',', $data[1]) : [];

        if (\count($sanitizeName) === 2) {
            list($prefix, $suffix) = $sanitizeName;
            $sanitizationMethod = $prefix . str_replace('_', '', ucwords($suffix, '_'));

            if (!method_exists($this, $sanitizationMethod)) {
                throw new MethodNotFoundException($sanitizationMethod);
            }

            $sanitizedValue = $this->{$sanitizationMethod}($value, $params);

            $keys = explode('.', trim($fieldName, '[]'));
            if (\count($keys) > 1) {
                $this->setNestedElement($this->validated, $keys, $sanitizedValue);
            } else {
                $this->validated[$fieldName] = $sanitizedValue;
            }
        }
    }

    private function setValidatedData($field, $data, $value)
    {
        $keys = explode('.', trim($field, '[]'));

        if (count($keys) > 1 && $this->isNestedKeyExists($data, $keys)) {
            $this->validated[$field] = $this->setNestedElement($data, $keys, $value);
        }

        if (array_key_exists($field, $data)) {
            $this->validated[$field] = $value;
        }
    }
}
