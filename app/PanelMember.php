<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class PanelMember extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "panelmembers";
    protected $fillable = [
      'email', 'password', 'photo', 'name', 'role',
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
