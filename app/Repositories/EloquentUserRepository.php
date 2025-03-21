<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepository;

class EloquentUserRepository implements UserRepository
{
    public function all()
    {
        return User::all();
    }

    public function find($id)
    {
        return User::find($id);
    }

    // Add other necessary methods
}
