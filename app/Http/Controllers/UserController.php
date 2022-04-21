<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;
use Mail;
use Storage;
use Auth, Validator, Response;
use App\User;
use App\Countries;
use App\Kycinformations;
use DB;
use Session;
use Redirect;
use Helper;
class UserController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
		 $this->kycinformations = new Kycinformations();
    }    
	public function index(){
	
		$this->data['title'] = 'User';
		return view('admin.user', $this->data);
	}
	public function signin(Request $request){
		$validator = Validator::make($request->all(), [
			'username'	=> 'required',
			'password' => 'required',
		]);		
		if ($validator->fails()) {
			return Response::json(array(
				'success' => false,
				'errors' => $validator->getMessageBag()->toArray()

			), 400);			
		}else{
			$login = 0;
			if (Auth::attempt(['email' => $request->input('username'), 'password' => $request->input('password'), 'status' => 0])) {
				$login = 1;				
			}elseif(Auth::attempt(['email' => $request->input('username'), 'password' => $request->input('password'), 'status' => 0])) {
				$login = 1;
			}
			if($login == 1){
				return Response::json(array(
					'success' => true,
					'message' => 'Successfully register please wait.....'
				), 200);
			}else{
				return Response::json(array(
					'success' => false,
					'errors' => array('Invalid email or mobile number pls enter valid information...')
				), 400);
			}				
		}
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
			if(env(MAILENV) == 'live'){
				$data = array('email'=>$request->input('email'),'name'=>$request->input('name'));
				$mail = Mail::send('mail.registration', $data, function($message) use ($data) {
					$message->to($data['email'], $data['name'])->subject
					('Payhub Registration');
					$message->from(env('MAIL_FROM_ADDRESS'),'');
				});
			}
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
		$user->mobile = $request->input('mobile'); 
		$user->gender = $request->input('gender');
		$user->country = $request->input('country_id');
		$user->state = $request->input('state');
		$user->city = $request->input('city');
		$user->address = $request->input('address');
		$user->dream_id = $request->input('dream_id');
		$image = $profile_images = '';   
	   if ($request->file('profile_image')) {
		$image = $request->file('profile_image');
		$profile_images = 'Profile_image' . time() . '_' . $image->getClientOriginalName();
		$image_resize = Image::make($image->getRealPath());              
		$image_resize->save(storage_path('app/public/profileimage/' .$profile_images));
		 $user->profile_image = $profile_images;
		//echo $profile_images; exit;
	}
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
	public function forgotpassword(Request $request){
			$msg = User::emailexistornot($request->input('email'));
			if($msg==0){
				return Response::json(array(
					'success' => false,
					'errors' => array('This email id does not have in our database record....')
				), 400);				
			}else{
				$newpassword = Helper::generatePassword(8);
				$data = array('mail'=>$request->input('email'));
				
				$user = User::where('email',$request->input('email'))->first();
				$user->password = Hash::make($newpassword);
				$user->save();
				
				if(env('MAILENV') == 'live'){
					$data = array('email'=>$request->input('email'),'password'=>$newpassword);
					$mail = Mail::send('mail.forgot', $data, function($message) use ($data) {
						$message->to($data['email'], '')->subject
						('Forgot password');
						$message->from(env('MAIL_FROM_ADDRESS'),'');
					});
				}
				if($mail){
					return Response::json(array(
						'success' => false,
						'errors' => array('Something went wrong pls try again....')
					), 400);					
				}else{
					return Response::json(array(
						'success' => false,
						'errors' => array('Password send sucessfully in your mailbox pls check.....')
					), 200);
				}				
			}				
	}
	public function updatekyc(Request $request){
		$image = $aadharimagesfront = $aadharimagesback = $panimagesfront = $panimagespanback ='';
		if ($request->file('aadharfront')) {
			$image = $request->file('aadharfront');
			$aadharimagesfront = 'Aadharfront' . time() . '_' . $image->getClientOriginalName();
			$image_resize = Image::make($image->getRealPath());              
			$image_resize->save(storage_path('app/public/aadhar/' .$aadharimagesfront));
		}
		if ($request->file('aadharback')) {
			$image = $request->file('aadharback');
			$aadharimagesback = 'Aadharback' . time() . '_' . $image->getClientOriginalName();
			$image_resize = Image::make($image->getRealPath());              
			$image_resize->save(storage_path('app/public/aadhar/' .$aadharimagesback));
		}
		if ($request->file('panfront')) {
			$image = $request->file('panfront');
			$panimagesfront = 'Panfront' . time() . '_' . $image->getClientOriginalName();
			$image_resize = Image::make($image->getRealPath());              
			$image_resize->save(storage_path('app/public/pan/' .$panimagesfront));
		}
		if ($request->file('panback')) {
			$image = $request->file('panback');
			$panimagespanback = 'Panback' . time() . '_' . $image->getClientOriginalName();
			$image_resize = Image::make($image->getRealPath());              
			$image_resize->save(storage_path('app/public/pan/' .$panimagespanback));
		}	
	    $count = Kycinformations::where('user_id',auth::user()->id)->count();
	    if ($count>0){
			$kycinformations = Kycinformations::where('user_id',auth::user()->id)->first();
		}else{ 
			$kycinformations = new Kycinformations();   
		}
		$kycinformations->user_id = auth::user()->id;
		$kycinformations->aadharnumber = $request->input("aadharnumber");
		$kycinformations->pannumber= $request->input("pannumber");
		$kycinformations->aadharfront = $aadharimagesfront;
		$kycinformations->aadharback = $aadharimagesback;
		$kycinformations->panfront = $panimagesfront;
		$kycinformations->panback = $panimagespanback;
		$kycinformations->save();	
		return redirect()->back()->with('message', 'Successfully Kycinformation is update...');  		
	}
	public function logout(){
		Auth::logout();
		Session::flush();
		return Redirect::to('/');		
	}

}
