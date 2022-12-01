<?php

declare(strict_types=1);

namespace App\Enum\Api;

enum RestRequestValidation: string
{
    case NAME_IS_REQUIRED = 'Name field is required';
    case DESCRIPTION_IS_REQUIRED = 'Description field is required';
    case USER_ID_IS_REQUIRED = 'User id is required';
    case CATEGORY_ID_IS_REQUIRED = 'Category id is required';
    case TOPIC_ID_IS_REQUIRED = 'Topic id is required';

    case NAME_FIELD_HAS_TO_BE_A_STRING = 'Name field has to be a string';
    case NAME_FIELD_HAS_TO_BE_UNIQUE = 'There is an object in db with the same name';
    case DESCRIPTION_HAS_TO_BE_A_STRING = 'Description has to be a string';
    case USER_ID_HAS_TO_BE_AN_INT = 'User id has to be an integer';
    case CATEGORY_ID_HAS_TO_BE_AN_INT = 'Category id has to be an integer';
    case TOPIC_ID_HAS_TO_BE_AN_INT = 'Topic id has to be an integer';
    case USER_HAS_TO_BE_REGISTERED_IN_DB = 'User has to be registered in db';

    case CATEGORY_EXISTS = "This category does not exist";
    case TOPIC_NOT_FOUND = 'There is no topic with this id';
}