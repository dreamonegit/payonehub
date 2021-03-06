<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Storage;
use Auth, Validator;
use App\User;
use DB;
use Session;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
		$this->user = new User();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function index(){
	//echo "33"; exit;
		$this->data['title'] = 'Home';
		return view('admin.index', $this->data);
	}
	public function logout(){
		Auth::logout();
		Session::flush();
		return Redirect::to('/admin');		
	}
}
