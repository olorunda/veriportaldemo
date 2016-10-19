<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class professional_quals extends Model
{
    //
	protected $table='professional_quals';

	protected $fillable = ['user_ref', 'name', 'position'];
}
