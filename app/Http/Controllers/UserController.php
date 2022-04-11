<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;
use Storage;
use Session;
use Auth, Validator, Response;
use App\User;
use App\Countries;
use App\Kycinformations;
use DB;
use Redirect;

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
			}elseif(Auth::attempt(['mobile' => $request->input('username'), 'password' => $request->input('password'), 'status' => 0])) {
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
		  return redirect()->back()->with('message', 'Successfully profile is update...');  		
	}
	public function logout(){
		Auth::logout();
		Session::flush();
		return Redirect::to('/');		
	}

}
