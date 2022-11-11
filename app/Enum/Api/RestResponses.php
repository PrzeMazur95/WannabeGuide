<?php

declare(strict_types=1);

namespace App\Enum\Api;

enum RestResponses: string
{
    case NEW_TOPIC_HAS_BEEN_ADDED = 'Your topic has been succesfully added!';

    case TOPIC_HAS_BEEN_UPDATED = 'Topic has been succesfully updated!';
    case TOPIC_HAS_BEEN_DELETED = 'Topic has been succesfully deleted!';

    case ERROR_ADD_NEW_TOPIC = 'Something went wrong when adding new topic, please try one more time, or contact with admin';
    case ERROR_GET_ALL_POSTS = 'Something went wrong when trying to see all topics, please try one more time, or contact with admin';
    case ERROR_GET_SPECIFIC_TOPIC = 'Something went wrong when trying to see typed topic, please try one more time, or contact with admin';
    case ERROR_UPDATE_TOPIC = 'Something went wrong when trying to update typed topic, please try one more time, or contact with admin';
    case ERROR_DELETE_TOPIC = 'Something went wrong when trying to delete typed topic, please try one more time, or contact with admin';

    case TOPIC_NOT_FOUND = 'There is no topic with this id';
    case TOPICS_NOT_FOUND = 'There are no topics available';
    case USER_NOT_FOUND = 'There is no user with this id';

    case USER_IS_NOT_AN_OWNER = 'User which you have typed is not an owner of this topic';

    case ERROR_GET_ALL_CATEGORIES = 'Something went wrong when trying to see all categories, please try one more time, or contact with admin';
}