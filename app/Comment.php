<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

	protected $fillable = [
		'mem_id', 'ref_num', 'comment'
	];
}
