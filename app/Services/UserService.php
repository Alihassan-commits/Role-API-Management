<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function getAllUsers()
    {
        return User::with('roles')->get();
    }

    public function assignRole($userId, $roleId)
    {
        $user = User::findOrFail($userId);

        $user->roles()->syncWithoutDetaching([$roleId]);

        return true;
    }
}
