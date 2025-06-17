<?php

namespace Gathern\CasdoorAPI\Enum;

enum GrantType: string
{
    case AUTHORIZATION_CODE = 'authorization_code';
    case CLIENT_CREDENTIALS = 'client_credentials';
    case REFRESH_TOKEN = 'refresh_token';
    case PASSWORD = 'password';
    case TOKEN = 'token';

}
