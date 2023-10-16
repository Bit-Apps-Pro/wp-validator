<?php

namespace BitApps\WPValidator;

class ErrorBag
{
    protected $errors = [];

    public function addError($role, $customMessages)
    {
        $attributeKey = $role->getInputDataContainer()->getAttributeKey();
        $roleName = $role->getRuleName();
        $paramValues = $role->getParamValues();

        $defaultPlaceholders = [
            'attribute' => $role->getInputDataContainer()->getAttributeLabel(),
            'value' => $role->getInputDataContainer()->getAttributeValue(),
        ];

        $placeholders = array_merge($paramValues, $defaultPlaceholders);

        if (is_string($roleName) && isset($customMessages[$attributeKey][$roleName])) {
            $message = $this->replacePlaceholders($placeholders, $customMessages[$attributeKey][$roleName]);
        } elseif (is_string($roleName) && isset($customMessages[$roleName])) {
            $message = $this->replacePlaceholders($placeholders, $customMessages[$roleName]);
        } else {
            $message = $this->replacePlaceholders($placeholders, $role->message());
        }

        $nestedKeys = explode('.', $attributeKey);

        if (is_array($nestedKeys)) {
            $this->generateNestedError($nestedKeys, $message);
        } else {
            $this->errors[$attributeKey][] = $message;
        }

    }

    private function generateNestedError($keys, $message)
    {
        $errors = &$this->errors;

        while ($keys) {
            $key = array_shift($keys);

            if (isset($current[$key]) && !is_array($current[$key])) {
                $errors[$key] = [];
            }

            $errors = &$errors[$key];
        }

        $errors = $message;
    }

    private function replacePlaceholders($placeholders, $message)
    {
        foreach ($placeholders as $key => $placeholder) {
            if (isset($placeholders[$key])) {
                if (is_array($placeholder)) {
                    $placeholder = implode(',', $placeholder);
                }
                $message = str_replace(":" . $key, $placeholder, $message);
            }
        }
        return $message;
    }

    public function getErrors($field = null)
    {
        return $this->errors;
    }

    public function hasErrors($field = null)
    {
        if ($field === null) {
            return !empty($this->errors);
        }

        return isset($this->errors[$field]) && !empty($this->errors[$field]);
    }
}
