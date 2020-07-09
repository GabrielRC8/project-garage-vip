<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name','home','status'];

    public function pages()
    {
        return $this->belongsToMany('App\Page');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
