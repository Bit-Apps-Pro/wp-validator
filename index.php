<?php

use BitApps\WPValidator\Validator;

require 'vendor/autoload.php';
//basic testing 
$inputs = [
    'name' => '',
    'email' => 'invalidmail',
    'age' => 'ass',
];

$rules = [
    'name' => ['required'],
    'email' => ['nullable', 'email'],
    'age' => ['nullable', 'integer'],
];

$customMessages=[
    'email'=>[
        'email'=>'This :value is invalid '
    ]
];

$attributeLabels=[
    'name'=>'Name',
    'age'=>'Age',
    'email'=>'Email'
];

$validator = new Validator;

$validator->make($inputs, $rules, $customMessages, $attributeLabels);

echo "<pre>";
echo print_r($validator->errors(), true);
echo "<pre>";

