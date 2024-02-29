<?php

use BitApps\WPValidator\Validator;

test(
    'validate-wildcard',
    function () {
        $validator = new Validator;

        $data = [
            'by_role' => [
                'administrator' => [
                    'path'     => '/home/data/www/wp-dev/wp-content',
                    'commands' => [
                        'download', 'cut', 'copy', 'edit', 'rm', 'upload', 'duplicate', 'paste',
                        'mkfile', 'mkdir', 'rename', 'archive', 'extract'
                    ],
                ],
                'editor'    => [
                    'path'     => '/home/data/www/wp-dev/wp-content/uploads',
                    'commands' => ['download'],
                ],
                'author'     => [
                    'path' => '/home/data/www/wp-dev/wp-content/uploads/file-manager',
                ],
                'contributor' => ['path' => ["/path/to/folder"]],
                'subscriber'  => [
                    'path'     => '/home/data/www/wp-dev/wp-content/uploads/file-manager',
                    'commands' => 'cut',
                ]
            ],
        ];

        $rules = [
            'by_role.*.path' => ['nullable', 'string'],
            'by_role.*.commands' => ['nullable', 'array'],
        ];

        $validation = $validator->make($data, $rules);
        $errors = $validation->errors();
        expect($validation->fails())->toBe(true);
        expect($errors)->toBeArray();
        expect($errors)->toHaveCount(2);
        expect($errors)->toHaveKeys(['by_role.contributor.path', 'by_role.subscriber.commands']);
        expect($errors)->toBe(
            [
                'by_role.contributor.path' => ['The by_role.contributor.path field should be string'],
                'by_role.subscriber.commands' => ['The by_role.subscriber.commands must be array'],
            ]
        );
    }
);
