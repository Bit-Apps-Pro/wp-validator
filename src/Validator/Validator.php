<?php

namespace BitApps\ValidatorSanitizer\Validator;

class Validator
{
    protected $data;
    protected $rules = [];
    protected $errors = [];

    public function __construct($data, $rules)
    {
        $this->data = $data;
        $this->rules = $rules;
    }

    public function validate()
    {
        foreach ($this->rules as $field => $ruleNames) {
            // $rules = explode('|', $ruleNames);

            // foreach ($ruleNames as $ruleName) {
            //     $rule = $this->resolveRule($ruleName);

            //     if (!$rule->passes($field, $this->getValue($field), $this->data)) {
            //         $this->addError($field, $rule->message());
            //     }
            // }
        }

        return empty($this->errors);
    }

    protected function resolveRule($ruleName)
    {

        // switch ($ruleName) {
        //     case 'required':
        //         return new RequiredRule();
        //     case 'email':
        //         return new EmailRule();
        //     // Add more rule classes here.
        //     default:
        //         throw new \InvalidArgumentException("Unsupported validation rule: $ruleName");
        // }
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
