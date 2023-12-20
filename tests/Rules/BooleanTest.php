<?php

use BitApps\WPValidator\Rules\BooleanRule;

test('boolean', function () {

    $rule = new BooleanRule();
    expect(true)->toBe($rule->validate('1'));
    expect(true)->toBe($rule->validate(1));
    expect(true)->toBe($rule->validate('0'));
    expect(true)->toBe($rule->validate(0));
    expect(true)->toBe($rule->validate('true'));
    expect(true)->toBe($rule->validate('false'));
    expect(true)->toBe($rule->validate(true));
    expect(true)->toBe($rule->validate(false));
});
