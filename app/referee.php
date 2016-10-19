<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class referee extends Model
{
	protected $table='referees';
    //

    protected $fillable = ['user_ref', 'name', 'organization', 'position', 'email', 'phone'];
}
