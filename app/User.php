<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	public static function emailexistornot($email){
		
		$count = User::where('email', $email)->count();
		
		return $count;
	}
	public static function login($data = array()){
		return User::where('email',$data['email'])->first();
	}
	public static function emailmobilecheckexist($email,$mobile){
		$message = '';
		$emailcount = User::where('email',$email)->count();
		if($emailcount > 0){
			$message .= 'Email id is already exist please use another mail id..<br>';
		}
		
		$mobilecount = User::where('mobile',$mobile)->count();
		if($mobilecount > 0){
			$message .= 'Mobile number is already exist please use another mobile number..';
		}
		return $message;
	}
}
