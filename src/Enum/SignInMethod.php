<?php

namespace Gathern\CasdoorAPI\Enum;

enum SignInMethod: string
{
    case PASSWORD = 'password';
    case VERIFICATION_CODE = 'verification_code';
}
