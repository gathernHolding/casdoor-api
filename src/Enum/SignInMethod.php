<?php

namespace Gathern\CasdoorAPI\Enum;

enum SignInMethod: string
{
    case PASSWORD = 'password';
    case VerificationCode = 'Verification code';
}
