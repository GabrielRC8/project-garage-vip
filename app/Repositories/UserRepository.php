<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

use App\User;

class UserRepository
{
    public function all() {
        return User::where('status','<>', 2)
            ->orderBy('name', 'asc')
            ->get();

    }

    public function delete($user) {
        $user->status = 2;

        $user->save();
    }
    
    public function isSeller($paramUser = null)
    {
        $user = $paramUser ? $paramUser : Auth::user();
        
        $activeSites = $user->sites()->where('status','=',2)->count();
        
        if( $activeSites < 3 ) {
            return false;
        }
        
        return true;
    }
}