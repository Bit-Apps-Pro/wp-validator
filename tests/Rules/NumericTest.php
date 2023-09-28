<?php

use BitApps\WPValidator\Rules\NumericRule;

test('numeric', function () {

    $rule = new NumericRule();

    expect(true)->toBe($rule->validate('-45'));
    expect(true)->toBe($rule->validate('3.14'));
    expect(true)->toBe($rule->validate(3.14));
    expect(true)->toBe($rule->validate(0));

});
