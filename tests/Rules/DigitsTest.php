<?php

use BitApps\WPValidator\Rules\DigitsRule;

test('digit', function () {

    $rule = new DigitsRule();

    expect(true)->toBe($rule->validate('23431'));
    expect(true)->toBe($rule->validate(2323));
    expect(true)->toBe($rule->validate('2323'));

});
