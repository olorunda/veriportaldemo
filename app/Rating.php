<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
	protected $table='rating';
	protected $fillable = [
		'name', 'ref_num', 'rating', 'type',
	];
}
