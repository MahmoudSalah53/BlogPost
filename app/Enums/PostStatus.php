<?php

namespace App\Enums;

enum PostStatus: int
{
    case draft = 0;
    case published = 1;
}
