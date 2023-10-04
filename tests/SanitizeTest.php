<?php

use BitApps\WPValidator\Sanitizer;

test('validator', function () {
    $sanitizer = new Sanitizer();

    $data = [
        'first_name' => '<h1>Hi<h1>',
        'last_name' => '',
        'phone' => '018xxxxxxxx',
        'age' => '21',
        'email' => 'email@example',
        'password' => '##112233',
        'confirm_password' => '##11223',
        'agree' => 'yes',
    ];

// wp rules in sanitize
// 1.email
// 2.file_name
// 3.hax_color
// 4.html_class
// 5.key
// 6.meta
// 7.option
// 8.term_field
// 9.text_field
// 10.textarea_field
// 11.title
// 12.user
// 14.url

    $sanitizer = new Sanitizer();

    $data = [
        'first_name' => '<h1>Hi<h1>',
        'last_name' => '',
        'phone' => '018xxxxxxxx',
        'age' => '21',
        'email' => 'email@example',
        'password' => '##112233',
        'confirm_password' => '##11223',
        'agree' => 'yes',
    ];

// wp rules in sanitize
// 1.email
// 2.file_name
// 3.hax_color
// 4.html_class
// 5.key
// 6.meta
// 7.option
// 8.term_field
// 9.text_field
// 10.textarea_field
// 11.title
// 12.user
// 14.url

    $sanitizeRules = [
        'first_name' => ['text_field'],
        'email' => ['email'],
        'content' => ['textarea_field'],
        'url' => ['url'],
    ];

    $sanitizer->sanitize($data, $sanitizeRules);

    $sanitizer->sanitize($data, $sanitizeRules);

});
