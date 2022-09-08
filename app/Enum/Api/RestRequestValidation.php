<?php

declare(strict_types=1);

namespace App\Enum\Api;

enum RestRequestValidation: string
{
    case NAME_IS_REQUIRED = 'Name field is required';
    case DESCRIPTION_IS_REQUIRED = 'Description field is required';
    case USER_ID_IS_REQUIRED = 'User id is required';

    case NAME_FIELD_HAS_TO_BE_A_STRING = 'Name field has to be a string';
    case NAME_FIELD_HAS_TO_BE_UNIQUE = 'There is a topic with the same name';
    case DESCRIPTION_HAS_TO_BE_A_STRING = 'Description has to be a string';
    case USER_ID_HAS_TO_BE_AN_INT = 'User id has to be an integer';
}