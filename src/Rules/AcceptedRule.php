<?php

namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class AcceptedRule extends Rule
{
    public function validate($value)
    {
        $accepted = ['yes', 'on', '1', 1, true, 'true'];
        return in_array($value, $accepted, true);
    }
}
