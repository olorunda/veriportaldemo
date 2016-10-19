<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    //
	protected $table='contacts';
	protected $fillable = [
		'user_ref', 'street', 'city', 'lga',  'state', 'state_origin'
	];
}
