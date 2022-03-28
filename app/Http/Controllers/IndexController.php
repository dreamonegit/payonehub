<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function index(){
	
		$this->data['title'] = 'Home';
		return view('front.index', $this->data);
	}
	public function logout(){
		Auth::logout();
		Session::flush();
		return Redirect::to('/');		
	}
}
