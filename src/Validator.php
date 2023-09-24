<?php

namespace BitApps\WPValidator;

use BitApps\WPValidator\RuleErrorException;

class Validator
{
    protected $data;
    protected $rules = [];
    protected $errors = [];

    private $customMessages = [];
    private $attributeLabels = [];

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

    public function parseRule($rule)
    {
        $exp = explode(':', $rule, 2);
        $ruleName = $exp[0];

        $params = [$exp[1]];

        return [$ruleName, $params];
    }

    public function make($data, $ruleFields, $customMessages = null, $replaceAttributes = null)
    {

        $this->data = $data;

        // echo "<pre>";
        // echo print_r($ruleFields, true);
        // echo "<pre>";
        foreach ($ruleFields as $field => $rules) {
            // if (!is_array($rules)) {
            //     $rules = explode('|', $rules);
            // }
            foreach ($rules as $index => $t) {
                $rule = $this->resolveRule($t);
                $value = $this->getValue($field);
                $isValidated = $rule::validate($value, $field);

                if (!$isValidated) {

                    $message = $customMessages;

                    $this->addError($field, $rule->message());
                    break;
                }

            }

        }

    }

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

        if (is_string($ruleName)) {

        } else if (is_subclass_of($ruleName, Rule::class)) {
            $ruleObj = \is_object($ruleName) ? $ruleName : new $ruleName();

        }

        $ruleClass = "BitApps\WPValidator\\Rules\\" . str_replace(' ', '', ucwords($ruleName)) . 'Rule';

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

// $request->validate(
//     []
// );
$rules = [];

$requestData = [
    'name' => 'Shakhawat',
    'age' => 21,
];

$rules = [
    'title' => 'required|string',
    'age' => 'required|integer|between:5,10',
    'option' => 'required|in:option1,option2,option3',
];

$customMessages = [
    'title.required' => 'The :attribute is required',
    'age.required' => 'The :attribute is required',
];

$attributeLabel = [
    'name' => 'Name',
    'age' => 'Age',
];

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
