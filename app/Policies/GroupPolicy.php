<?php

namespace App\Policies;

use App\User;
use App\Group;

use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
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

    public function destroy(User $user, Group $group)
    {
        return true;
    }

}
