<?php

use BitApps\WPValidator\Rule;

arch('globals')
    ->expect(['die', 'error_log', 'var_dump', 'exit', 'print_r'])
    ->not->toBeUsed();

arch('should expect extend Rule class')
    ->expect('BitApps\WPValidator\Rules')
    ->toExtend(Rule::class);

arch('should expect validate and message methods')
    ->expect('BitApps\WPValidator\Rules')
    ->toHaveMethods(['validate', 'message']);
