<?php

declare(strict_types=1);

namespace App\Enum\Api;

enum LoggerMessages: string
{
    case ERROR_NEW_TOPIC_ADD = 'Something went wrong when adding new topic through API!';
    case ERROR_GET_ALL_POSTS = 'Something went wrong when trying to get all posts through API!';
}