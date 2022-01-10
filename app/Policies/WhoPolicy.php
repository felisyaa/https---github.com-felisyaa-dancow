<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class WhoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function isAdmin(User $user) {
        return $user->authorization === 1;
    }

    public function isModOrHigher(User $user) {
        return $user->authorization <= 2;
    }
}
