<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    
    protected $fillable = ['name', 'cpf', 'status', 'fone', 'fone_2',
                           'street', 'number', 'zipcode'];
}
