<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{	
	protected $primaryKey = 'c_id';
    protected $fillable=[
    	'fname',
    	'mname',
    	'lname'
    ];
}
