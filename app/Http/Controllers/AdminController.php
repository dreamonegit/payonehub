<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
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
	public function myprofile(){
		//echo auth::user()->id; exit;
		$this->data['title'] = 'My Profile';
		return view('admin.myprofile', $this->data);
	}
	public function updateprofile(Request $request){
		$user = User::where('id',auth::user()->id)->first();
		$user->name = $request->input('name'); 
		$user->email = $request->input('email'); 
		$user->mobile = $request->input('mobile');
		$user->status = $request->input('status');
	$image = $profile_images = '';   
	   if ($request->file('profile_image')) {
		$image = $request->file('profile_image');
		$profile_images = 'Profile_image' . time() . '_' . $image->getClientOriginalName();
		$image_resize = Image::make($image->getRealPath());              
		$image_resize->save(storage_path('app/public/profileimage/' .$profile_images));
		 $user->profile_image = $profile_images;
	}
		$user->save();
		return redirect()->back()->with('message', 'Successfully profile is update...');  		
	}
	public function resetpassword(Request $request){
		$this->data['title'] = 'Reset Password';
		return view('admin.resetpassword', $this->data);		
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
