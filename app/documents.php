<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
	protected $table='documents';
    //

    protected $fillable = ['user_ref', 'document'];
}
