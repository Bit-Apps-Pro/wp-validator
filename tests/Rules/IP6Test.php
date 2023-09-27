<?php

use BitApps\WPValidator\Rules\IP6Rule;

test('ip6', function () {

    $rule = new IP6Rule();

    expect(true)->toBe($rule->validate('2001:0:9d38:6abd:4801:93fc:3a12:1c5b'));
    expect(true)->toBe($rule->validate('2001:0da8:1a2f:9a7b:4a53:2b6c:7e9d:8460'));
    expect(true)->toBe($rule->validate('2001:0:0:1:0:0:0:1'));

});
