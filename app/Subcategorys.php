<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Subcategorys extends Authenticatable
{
    use Notifiable;
	
	protected $table="subcategorys";
	
	 public function getcategorys(){
			return $this->belongsTo('App\Categorys','cat_id','id');			 
	 }


}
