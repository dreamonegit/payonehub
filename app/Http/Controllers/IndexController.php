<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth, Validator, Response;
use DB;
use App\Countries;
use App\User;
use App\Kycinformations;
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
		$this->kycinformations = new Kycinformations();
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
	public function profile(){
		$this->data['title'] = 'Profile';
		$this->data['country'] = Countries::all();
		$this->data['aadhar'] = $this->kycinformations->where('user_id',auth::user()->id)->first();
		return view('front.profile', $this->data);		
	}
    public function contactus()
    {
        return view('front.contactus');
    }
	public function logout(){
		Auth::logout();
		Session::flush();
		return Redirect::to('/');		
	}
}
