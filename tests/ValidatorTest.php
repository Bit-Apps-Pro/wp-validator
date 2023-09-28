<?php

use BitApps\WPValidator\Validator;

test('validator', function () {
    $inputs = [
        'name' => 'Fabien',
        'email' => 'test@email.tld',
        'age' => 21,
    ];

    $rules = [
        'name' => ['required'],
        'email' => ['required'],
        'age' => ['required'],
    ];

    $validator = new Validator;
    $validator->make($inputs, $rules);

});
