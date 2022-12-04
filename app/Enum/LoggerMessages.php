<?php

declare(strict_types=1);

namespace App\Enum;

enum LoggerMessages: string
{
    case ERROR_NEW_TOPIC_ADD = 'Something went wrong when adding new topic in web!';
    case ERROR_GET_ALL_TOPICS = 'Something went wrong when trying to get all topics!';
    case ERROR_SAVE_NEW_TOPIC = 'Something went wrong when trying to save new topc!';
    case ERROR_UPDATE_TOPIC = 'Something went wrong when trying to update this topic!';
    case ERROR_DELETE_TOPIC = 'Something went wrong when trying to delete this topic!';

    case ERROR_SAVE_NEW_CATEGORY = 'Something went wrong when trying to save new category!';
    case ERROR_UPDATE_CATEGORY = 'Something went wrong when trying to update this category!';
    case ERROR_DELETE_CATEGORY = 'Something went wrong when trying to delete this category!';

    case ERROR_SAVE_NEW_TAG = 'Something went wrong when adding new TAG in web!';
}