<?php

namespace App\Services;

use App\Models\User;
use App\Enum\Api\LoggerMessages;
use Illuminate\Support\Facades\Log;

class UserService {

    public function __construct(
        private User $user,
    ){
    }

    public function checkIfExists(int $user_id)
    {
        try{
            if(!$this->user::find($user_id)){
                return false;
            } 
    
            return true;
        } catch(\Exception $e) {

            $this->logger::error(LoggerMessages::ERROR_GET_USER_FROM_DB->value, ['error' => $e->getMessage()]);

            return false;
        }

    }
}