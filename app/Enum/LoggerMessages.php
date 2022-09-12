<?php

declare(strict_types=1);

namespace App\Enum;

enum LoggerMessages: string
{
    case ERROR_NEW_TOPIC_ADD = 'Something went wrong when adding new topic in web!';
}