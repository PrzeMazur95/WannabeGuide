<?php

namespace App\Services;

use App\Models\User;

class UserService {

    public function __construct(
        private User $user,
    ){
    }

    public function checkIfExists(int $user_id)
    {
        if(!$this->user::find($user_id)){
            return false;
        } 

        return true;
    }
}