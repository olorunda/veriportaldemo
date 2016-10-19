<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\SoftDeletes;

class Panelist extends Model
{
    //
    //use SoftDeletes;

    protected $table='panelmembers';

    protected $fillable = ['name','email','photo','password'];

    protected $hidden = ['password', 'remember_token'];
}
