<?php

use BitApps\WPValidator\Validator;

test('validator', function () {
    $validator = new Validator;

    $data = [
        'first_name' => 'John',
        'last_name' => '',
        'phone' => '',
        'email' => 'email@example',
        'password' => '##112233',
        'confirm_password' => '##11223',
    ];

    $rules = [
        'first_name' => ['required', 'string'],
        'last_name' => ['required', 'string'],
        'phone' => ['nullable', 'integer'],
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8'],
        'confirm_password' => ['required', 'same:password'],
    ];

    $customMessages = [];

    $attributes = [
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'phone' => 'Phone',
        'email' => 'Email',
        'password' => 'Password',
        'confirm_password' => 'Confirm Password',
    ];

    $validation = $validator->make($data, $rules, $customMessages, $attributes);
    $errors = $validation->errors();
    expect(true)->toBe($validation->fails(true));
    expect($errors)->toBeArray();
    expect($errors)->toHaveCount(3);
    expect($errors)->toHaveKeys(['last_name', 'email', 'confirm_password']);
    expect($errors)->toBe([
        'last_name' => ['The Last Name field is required'],
        'email' => ['The Email must be a valid email address'],
        'confirm_password' => ['The Confirm Password and password must match'],
    ]);
});
