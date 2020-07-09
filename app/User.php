<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'group_id', 'password', 'status'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function sites()
    {
        return $this->hasMany(Site::class);
    }
    
    public function sellerPays()
    {
        return $this->hasMany(SellerPay::class);
    }
}
