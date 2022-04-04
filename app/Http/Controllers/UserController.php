<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Storage;
use Auth, Validator, Response;
use App\User;
use App\Countries;
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
	public function signup(Request $request){
		$validator = Validator::make($request->all(), [
			'name'	=> 'required',
			'email' => 'required|email',
			'mobile' => 'required|digits:10',
			'password' => 'required',
		]);		
		if ($validator->fails()) {
			return Response::json(array(
				'success' => false,
				'errors' => $validator->getMessageBag()->toArray()

			), 400);			
		}else{
			$msg = User::emailmobilecheckexist($request->input('email'),$request->input('mobile'));
			if($msg!=''){
				return Response::json(array(
					'success' => false,
					'errors' => array($msg)
				), 400);				
			}
			$user = new User;
			$user->name = $request->input('name'); 
			$user->email = $request->input('email'); 
			$user->mobile = $request->input('mobile');
			$user->password = Hash::make($request->input('password'));
			$user->save();
			auth()->login($user);
			return Response::json(array(
				'success' => true,
				'message' => 'Successfully register please wait.....'
			), 200);			
		}
	}
	public function updateprofile(Request $request){
		$user = User::where('id',auth::user()->id)->first();
		$user->name = $request->input('name'); 
		$user->dob = $request->input('dob'); 
		$user->gender = $request->input('gender');
		$user->country = $request->input('country_id');
		$user->save();
		return redirect()->back()->with('message', 'Successfully profile is update...');  		
	}
	public function updatepassword(Request $request){
		$validator  =   Validator::make($request->all(), [
			 'current_password'     =>  'required',
			 'new_password'    =>  'required',
			 'new_confirm_password'   =>  'same:new_password',
		 ]);                                                                                                                                                                                                                               
		if ($validator->fails()) {
			   $messages = $validator->messages();
			   return redirect()->back()->withErrors($messages)->withInput($request->all()); 
		 }   
		 if (!Hash::check($request->current_password, auth()->user()->password)) { 
		 
			return redirect()->back()->with('message', 'Current password is wrong...'); 
			
		 }
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
		
		return redirect()->back()->with('message', 'Successfully password is updated...');  		
	}
}
