<?php

declare(strict_types=1);

namespace App\Enum\Api;

enum LoggerMessages: string
{
    case ERROR_NEW_TOPIC_ADD = 'Something went wrong when adding new topic through API!';
    case ERROR_GET_ALL_TOPICS = 'Something went wrong when trying to get all topics through API!';
    case ERROR_SHOW_SPECIFIC_TOPIC = 'Something went wrong when trying to show speciifc topic through API!';
    case ERROR_UPDATE_TOPIC = 'Something went wrong when trying to update this topic through API!';
    case ERROR_GET_USER_FROM_DB = 'Something went wrong when trying to get user from db through API!';
}