<?php

use BitApps\ValidatorSanitizer\Rules\Required;

test('required', function () {

    $rule = new Required();

    expect(true)->toBe($rule->check('foo'));
    expect(true)->toBe($rule->check([1]));
    expect(true)->toBe($rule->check(1));
    expect(true)->toBe($rule->check(true));
    expect(true)->toBe($rule->check('0'));

});
