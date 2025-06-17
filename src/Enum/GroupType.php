<?php

declare(strict_types=1);

namespace Gathern\CasdoorAPI\Enum;

enum GroupType: string
{
    case VIRTUAL = 'Virtual';
    case PHYSICAL = 'Physical';

}
