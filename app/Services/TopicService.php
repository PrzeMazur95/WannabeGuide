<?php

namespace App\Services;

use App\Enum\Api\LoggerMessages;
use Illuminate\Support\Facades\Log;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Collection;

class TopicService
{
    /**
     * Dependency injection
     * 
     * @param Topic $topic
     * @param Log $logger
     */
    public function __construct(
        private Topic $topic,
        private Log $logger
    ) { 
    }

    /**
     * Method to check is specified topic exists
     *
     * @param integer $topic_id
     * @return bool
     */
    public function checkIfExists(int $topic_id): bool
    {
        try{
            if (!$this->topic::find($topic_id)) {
                return false;
            } 
    
            return true;
        } catch(\Exception $e) {

            $this->logger::error(LoggerMessages::ERROR_SHOW_SPECIFIC_TOPIC->value, ['error' => $e->getMessage()]);

            return false;
        }
    }

    /**
     * Undocumented function
     *
     * @param string $phrase
     * @return Collection
     */
    public function findSearchingTopics($phrase): Collection
    {
        return $this->topic::where('name', 'Like', '%'.$phrase.'%')
            ->orWhere('description', 'Like', '%'.$phrase.'%')->get();
    }
}