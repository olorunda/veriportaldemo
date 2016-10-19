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
      'pos_id',  'email', 'password','type', 'dob', 'age', 'sex', 'state_of_origin', 'phone_num', 'lga', 'marital_status', 'image', 'f_name', 'l_name', 'm_name', 'maiden_name','progress', 'rated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
