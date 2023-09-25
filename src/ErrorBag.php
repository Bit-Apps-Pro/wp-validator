<?php

namespace BitApps\WPValidator;

class ErrorBag
{
    protected $errors = [];
    // public $customMessages;

    public function addError($field, $rule, $message)
    {
        $this->errors[$field][$rule] = $message;
    }

    public function setCustomMessage($field, $ruleName, $attributeLabel, $paramValues, $params)
    {
        // if (isset($this->customMessages[$field][$ruleName])) {
        //     $message = str_replace(":attribute", $attributeLabel, $this->customMessages[$field][$ruleName]);
        //     foreach ($params as $key => $param) {
        //         if (isset($paramValues[$key])) {

        //             $message = str_replace(":" . $param, $paramValues[$key], $message);
        //         }
        //     }
        //     return $this->messages[$field][$ruleName] = $message;
        // }
    }

    public function getErrors($field = null)
    {
        // if ($field === null) {
        //     return $this->messages;
        // }

        // return $this->messages[$field] ?? [];
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
