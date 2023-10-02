<?php

namespace BitApps\WPValidator;

trait Helpers
{
    public function isEmpty($val)
    {
        if (empty($val) && !in_array($val, ['0', 0, 0.0], true)) {
            return true;
        }
        return false;
    }
}
