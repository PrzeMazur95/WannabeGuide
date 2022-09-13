<?php

declare(strict_types=1);

namespace App\Enum;

enum ErrorMessages: string
{
    case SMTH_WENT_WRONG_WITH_DB = 'Something went wrong with db connection, please try again. If problem is the same, please contact with admin!';
}