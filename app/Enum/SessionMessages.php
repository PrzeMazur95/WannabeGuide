<?php

declare(strict_types=1);

namespace App\Enum;

enum SessionMessages: string
{
    case TOPIC_ADDED = 'Topic has been succesfully added!';
    case TOPIC_DELETED = 'Topic has been succesfully deleted!!';
    case TOPIC_UPDATED = 'Topic has been succesfully updated !';

    case CATEGORY_ADDED = 'Category has been succesfully added!';
}