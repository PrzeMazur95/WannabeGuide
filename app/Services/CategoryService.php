<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Category;
use App\Models\User;


class CategoryService
{
    /**
     * Dependency injection
     *
     * @param Category $category
     * @param User $user
     */
    public function __construct(
        private Category $category,
        private User $user
    ) {
    }

    /**
     * Checks if user is an owner of given category
     *
     * @param User $user_id
     * @param Category $category_id
     * @return bool
     */
    function ifUserIsAnOwnerOfGivenCategory($category_id, $user_id): bool
    {
        return ($user_id !== $this->category->find($category_id)->user_id) ? true : false;
    }
}