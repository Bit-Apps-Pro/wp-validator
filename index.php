<?php

require __DIR__ . '/vendor/autoload.php';

$data = [
    'names' => [
        'first_name' => 'John',
        'last_name'  => '',
    ],
    'users' => [
        [
            [
                'id'    => 1,
                'value' => 'A',
            ],
            [
                'id'    => 2,
                'value' => '2',
            ],
            [
                'id'    => 3,
                'value' => 5,
            ],
        ],
        [
            [
                'id'    => 1,
                'value' => 'A',
            ],
            [
                'id'    => 2,
                'value' => 2,
            ],
            [
                'id'    => 3,
                'value' => 6,
            ],
        ],
    ],
];

$rules = [
    // 'users.*.*.id'    => ['required', 'integer'],
    'users.*.*.value' => ['required', 'string'],
];

$validator      = new BitApps\WPValidator\Validator;
$customMessages = [
    // 'users.*.*.id.string'    => 'Each item must have an ID.',
    'users.*.*.value.string' => 'Each item must have a string',
];
$validation = $validator->make($data, $rules, $customMessages);
if ($validation->fails()) {
    echo json_encode($validation->errors(), JSON_PRETTY_PRINT);
} else {
    echo "Validation passed!";
}
