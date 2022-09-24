<?php

declare(strict_types=1);

namespace App\Enum\Api;

enum RestResponses: string
{
    case NEW_TOPIC_HAS_BEEN_ADDED = 'Your topic has been succesfully added!';

    case ERROR_ADD_NEW_TOPIC = 'Something went wrong when adding new topic, please try one more time, or contact with admin';
    case ERROR_GET_ALL_POSTS = 'Something went wrong when trying to see all topics, please try one more time, or contact with admin';
    case ERROR_GET_SPECIFIC_TOPIC = 'Something went wrong when trying to see typed topic, please try one more time, or contact with admin';

    case TOPIC_NOT_FOUND = 'There is no topic with this id';
    case TOPICS_NOT_FOUND = 'There are no topics available';
}