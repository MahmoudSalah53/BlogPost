<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case Author = 'author';
    case Reader = 'reader';
}
