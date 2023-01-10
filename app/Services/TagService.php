<?php

declare(strict_types=1);

namespace App\Services;

class TagService
{
    /**
     * Method attaching tags to a given topic
     *
     * @param object $topic
     * @param array $tags_id
     * 
     * @return void
     */
    public function attachTagsToTopic($topic, $tags_id): void
    {
        $topic->tags()->sync($tags_id);
    }
}