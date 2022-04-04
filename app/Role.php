<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Role extends Authenticatable
{
    use Notifiable;
	protected $table = 'roles';
	
	public static function getrolename($id){
		
		$rolename = Role::where('id',$id)->pluck('rolename');
		return $rolename[0];
	}
}
