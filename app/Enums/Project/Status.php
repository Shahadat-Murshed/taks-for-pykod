<?php

namespace App\Enums\Project;

use App\Traits\Enum\Enummerrayble;

enum Status: string
{
    use Enummerrayble;
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case HOLD = 'hold';
}
