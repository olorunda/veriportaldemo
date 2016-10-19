<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class relevant_exp extends Model
{
 protected $table='relevant_exp';   //

 protected $fillable = ['user_ref', 'name', 'position','start_date','end_date'];
}
