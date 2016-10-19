<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class institution extends Model
{


	protected $fillable = [
		'user_ref', 'sdegree','iname', 'sname', 'pname', 'course', 'istart_date', 'iend_date', 'sstart_date', 'send_date', 'degree', 'grade'
	];
}
