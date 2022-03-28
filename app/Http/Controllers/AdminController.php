<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Storage;
use Auth, Validator;
use App\User;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
    }    
	public function index(){
	
		$this->data['title'] = 'Home';
		return view('admin.index', $this->data);
	}
}
