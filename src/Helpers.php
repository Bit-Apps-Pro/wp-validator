<?php

namespace BitApps\WPValidator;

trait Helpers
{
    public function isEmpty($val)
    {
        if (empty($val) && !is_numeric($val)) {
            return true;
        }

        return false;
    }
}
