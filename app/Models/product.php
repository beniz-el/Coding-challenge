<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
	protected $casts = [
		'category' =>'array'];

    protected $fillable = [
    	'id','name','description','price','image','category', ];
}
