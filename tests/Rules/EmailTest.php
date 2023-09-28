<?php

use BitApps\WPValidator\Rules\EmailRule;

test('email', function () {

    $rule = new EmailRule();

    expect(true)->toBe($rule->validate('support12345@email-provider.org'));
    expect(true)->toBe($rule->validate('mary.smith123@example.co.uk'));
    expect(true)->toBe($rule->validate('contact@company-name.io'));

});
