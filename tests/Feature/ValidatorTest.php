<?php

use BitApps\WPValidator\Validator;

test('Validation', function () {

    $requestData = [
        'name' => 'sfd',
        // 'age' => 'sdfs',
    ];
    // |between:5,10
    $rules = [
        'name' => ['required'],
        // 'age' => 'required|integer|new Custom',
        // 'option' => 'required|in:option1,option2,option3',
    ];

    $customMessages = [
        'required' => 'The :attribute is required',
        // 'age.required' => 'The :attribute is required',
    ];

    $attributeLabel = [
        'name' => 'Name',
        // 'age' => 'Age',
    ];

    $validator = (new Validator);
    $validator->make($requestData, $rules, $customMessages, $attributeLabel);

    $expectErrors = [
        'name' => [
            'The name field is required',
        ],
        // 'age' => [
        //     'The age field should be integer',
        // ],
    ];

    // echo "<pre>";
    // echo print_r($validator->errors(), true);
    // echo "<pre>";

    expect($expectErrors)->toMatchArray($validator->errors());

});
