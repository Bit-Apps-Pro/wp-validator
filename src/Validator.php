<?php

namespace BitApps\ValidatorSanitizer;

use BitApps\ValidatorSanitizer\RuleErrorException;

class Validator
{
    protected $data;
    protected $rules = [];
    protected $errors = [];

    // public function __construct($data, $rules)
    // {
    //     $this->data = $data;
    //     $this->rules = $rules;
    // }

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

    public function make($data, $ruleFields, $messages = null, $replaceAttributes = null)
    {
        $this->data = $data;
        foreach ($ruleFields as $field => $rules) {

            if (!is_array($rules)) {
                $rules = explode('|', $rules);
            }

            foreach ($rules as $rule) {
                $rule = (new self)->resolveRule($rule);

                // if (!$rule->passes($field, $this->getValue($field), $this->data)) {
                //     $this->addError($field, $rule->message());
                // }
                $value = (new self)->getValue($field);
                if ($rule->check($value)) {

                    (new self)->addError($field, $rule->message($message = ''));
                }
            }

        }
    }

    // public function validate($data, $rules)
    // {

    //     $this->data = $data;
    //     foreach ($rules as $field => $ruleNames) {

    //         if (is_array($ruleNames)) {
    //             $rules = $ruleNames;
    //         } else {
    //             $rules = explode('|', $ruleNames);
    //         }

    //         foreach ($rules as $rule) {
    //             $rule = $this->resolveRule($rule);

    //             // if (!$rule->passes($field, $this->getValue($field), $this->data)) {
    //             //     $this->addError($field, $rule->message());
    //             // }

    //             if ($rule->check($this->getValue($field))) {
    //                 $this->addError($field, $rule->message());
    //             }
    //         }
    //     }
    //     return empty($this->errors);
    // }

    protected function addError($field, $message)
    {
        $this->errors[$field][] = $message;
    }

    public function fails()
    {
        return !empty($this->errors) ? true : false;
    }

    public function errors()
    {
        return $this->errors;
    }

    protected function resolveRule($ruleName)
    {
        $ruleClass = "BitApps\ValidatorSanitizer\\Rules\\" . str_replace(' ', '', ucwords($ruleName));

        if (!class_exists($ruleClass)) {
            throw new RuleErrorException("Unsupported validation rule: $ruleName");
        }

        return new $ruleClass;
    }

}

// $data = [
//     'names' => [
//         'first_name' => 'John',
//         'last_name' => 'Doe',
//     ],
//     'email' => 'invalid-email',
// ];

// $rules = [
//     'names.first_name' => 'required',
//     'names.last_name' => 'required',
//     'email' => 'required|email',
// ];

// $validator = new Validator($data, $rules);

// if ($validator->validate()) {
//     echo "Validation passed!";
// } else {
//     $errors = $validator->errors();
//     print_r($errors);
// }

//custom message rule

//Validator Feature

$request->validate(
    []
);
$rules = [];

$requestData = [
    'name' => 'Shakhawat',
    'age' => 21,
];

$rules = [
    'title' => 'required|string',
    'age' => 'required|integer',
];

$customMessages = [
    'title.required' => 'The :attribute is required',
    'age.required' => 'The :attribute is required',
];

$attributeLabel = [
    'name' => 'Name',
    'age' => 'Age',
];

$validator = (new Validator)->make($requestData, $rules, $customMessages, $attributeLabel);

//File Create with request
//old package rules feature

#required
#numeric
#integer
#ip
#IPv4
#IPv6
#macAddress
#JSON
#array
#arrayOfString
#email
#url
#string
#date
#min
#max
#nullable
#boolean
#accepted
#declined
#timezone
#lowercase
