<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'Admin';
    case Author = 'Author';
    case Reader = 'Reader';
}
