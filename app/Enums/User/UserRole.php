<?php

namespace App\Enums\User;

use App\Traits\Enum\Enummerrayble;

enum UserRole: string
{
    use Enummerrayble;

    case Admin = 'admin';
    case Staff = 'staff';
}
