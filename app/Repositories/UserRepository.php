<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $user;

    /**
     * __construct
     *
     * @param  mixed $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    /**
     *  get all users
     *
     * @return object
     */
    public function getAllUsers()
    {
        return $this->user->all();
    }


}