<?php

namespace App\Services;

use App\Enum\Api\LoggerMessages;
use Illuminate\Support\Facades\Log;
use App\Models\Topic;

class TopicService {

    /**
     *
     * @param Topic $topic
     * @param Log $logger
     */
    public function __construct(
        private Topic $topic,
        private Log $logger
    ){
    }

    /**
     * Method to check is specified topic exists
     *
     * @param integer $topic_id
     * @return void
     */
    public function checkIfExists(int $topic_id)
    {
        try{
            if(!$this->topic::find($topic_id)){
                return false;
            } 
    
            return true;
        } catch(\Exception $e) {

            $this->logger::error(LoggerMessages::ERROR_SHOW_SPECIFIC_TOPIC->value, ['error' => $e->getMessage()]);

            return false;
        }

    }
}