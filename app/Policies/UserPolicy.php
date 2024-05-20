<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user)
    {
        return $user->hasPermission('user_view');
    }

    public function update(User $user)
    {
        return $user->hasPermission('User_update');

    }

    public function create(User $user)
    {
        return $user->hasPermission('User_create');

    }
    public function show(User $user)
    {
        return $user->hasPermission('User_show');

    }
    public function destroy(User $user)
    {
        return $user->hasPermission('User_destroy');

    }
}
