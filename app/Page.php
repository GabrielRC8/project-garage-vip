<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['name', 'route_name', 'route_path'];

    public function groups()
    {
        return $this->belongsToMany('App\Group');
    }
}
