<?php

namespace App\Policies;

use App\User;
use App\Page;

use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
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

    public function destroy(User $user, Page $page)
    {
        return true;
    }
}
