<?php

use BitApps\WPValidator\Rules\LowercaseRule;

test('lowercase', function () {

    $rule = new LowercaseRule();

    expect(true)->toBe($rule->validate('abc'));
    expect(true)->toBe($rule->validate('full_name'));
    expect(true)->toBe($rule->validate('first_name'));

});
