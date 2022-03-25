<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Storage;
use Auth, Validator;
use App\User;
use DB;
class UserController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
    }    
	public function index(){
	
		$this->data['title'] = 'User';
		return view('admin.user', $this->data);
	}
}
