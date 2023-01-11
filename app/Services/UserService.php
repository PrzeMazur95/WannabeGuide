<?php

namespace App\Services;

use App\Models\User;
use App\Enum\Api\LoggerMessages;
use Illuminate\Support\Facades\Log;
use App\Models\Topic;

class UserService
{
    /**
     * Dependency injection
     *
     * @param User $user
     * @param Topic $topic
     * @param Log $logger
     */
    public function __construct(
        private User $user,
        private Topic $topic,
        private Log $logger
    ){
    }

    /**
     * Method to check if user exists in db
     *
     * @param User $user_id
     * @return void
     */
    public function checkIfExists(int $user_id)
    {
        try{
            if (!$this->user::find($user_id)) {
                return false;
            } 
    
            return true;
        } catch(\Exception $e) {

            $this->logger::error(LoggerMessages::ERROR_GET_USER_FROM_DB->value, ['error' => $e->getMessage()]);

            return false;
        }
    }

    /**
     * Method to check if typed user is an owner of specific topic
     *
     * @param int $user_id
     * @param int $topic
     * @return void
     */
    public function checkIfUserIsAnOwnerOfSpecificTopic(int $user_id, int $topic) 
    {
        if ($this->topic::find($topic)->user_id === $user_id) {

            return true;
        } else {

            return false;
        }
    }
}