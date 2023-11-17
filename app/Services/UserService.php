<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class UserService
{
    protected $userRepository;

    /**
     * __construct
     *
     * @param  mixed $userRepository
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get all users based on filters if any
     *
     * @param  mixed $request
     * @return void
     */
    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }


}
