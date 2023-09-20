<?php

namespace BitApps\ValidatorSanitizer\Interfaces;

interface RuleInterface
{
    public function passes();

    public function messages();
}
