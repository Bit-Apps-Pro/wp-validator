<?php

use BitApps\WPValidator\Rules\Required;

test('required', function () {

    $rule = new Required();

    expect(true)->toBe($rule->validate('foo'));
    expect(true)->toBe($rule->validate([1]));
    expect(true)->toBe($rule->validate(1));
    expect(true)->toBe($rule->validate(true));
    expect(true)->toBe($rule->validate(true));

});
