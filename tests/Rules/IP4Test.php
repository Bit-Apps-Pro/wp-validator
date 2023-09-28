<?php

use BitApps\WPValidator\Rules\IP4Rule;

test('ipv4', function () {

    $rule = new IP4Rule();

    expect(true)->toBe($rule->validate('172.16.254.1'));
    expect(true)->toBe($rule->validate('255.255.255.255'));
    expect(true)->toBe($rule->validate('10.0.0.2'));

});
