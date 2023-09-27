<?php

use BitApps\WPValidator\Rules\IPRule;

test('ip', function () {

    $rule = new IPRule();
    expect(true)->toBe($rule->validate('172.16.0.100'));
    expect(true)->toBe($rule->validate('10.0.0.2'));
    expect(true)->toBe($rule->validate('192.168.1.1'));

});
