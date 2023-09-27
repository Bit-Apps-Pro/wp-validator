<?php

use BitApps\WPValidator\Rules\RequiredRule;

test('required', function () {

    $rule = new RequiredRule();

    expect(true)->toBe($rule->validate('foo'));
    expect(true)->toBe($rule->validate([1]));
    expect(true)->toBe($rule->validate(1));
    expect(true)->toBe($rule->validate(true));
    expect(true)->toBe($rule->validate(true));

});
