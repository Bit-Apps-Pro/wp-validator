<?php

use BitApps\WPValidator\Rules\AcceptedRule;

test('accepted', function () {

    $rule = new AcceptedRule();

    expect(true)->toBe($rule->validate('1'));
    expect(true)->toBe($rule->validate(1));
    expect(true)->toBe($rule->validate('true'));
    expect(true)->toBe($rule->validate('yes'));
    expect(true)->toBe($rule->validate('on'));

});
