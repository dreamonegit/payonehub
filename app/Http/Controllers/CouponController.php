<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Storage;
use Auth, Validator;
use App\User;
use App\Role;
use DB;
use Image;
use Hash;
class CouponController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
		$this->role = new Role();
    }    
	public function index(){
		$this->data['title'] = 'Coupon List';
		return view('admin.coupon', $this->data);
	}
	public function addcoupon(Request $request){
		if($request->post()){
			if($request->input('id')){
				$user = User::where('id',$request->input('id'))->first();
			}else{
				$user = new User;
				if(User::emailexistornot($request->input('email')) > 0){
					return redirect()->back()->with('message', 'E-mail id is already exist. pls try other email...');  
				}
			}
			$user->name = $request->input('name');
			$user->company = $request->input('company');
			$user->password = Hash::make('1234567890');
			$user->email = $request->input('email');
			$user->mobile = $request->input('mobile');
			$user->message = $request->input('message');
			$user->role = $request->input('role');
			$user->status = $request->input('status');
			if($request->file('profile_image')){
				$images = $request->file('profile_image');
				$image = 'profile_'.time().'_'.$images->getClientOriginalName();
				$image_resize = Image::make($images->getRealPath());
				$image_resize->save(storage_path('app/public/profile/'.$image));
				$user->profile_image = $image;
			}
			if($user->save()){
				return redirect('admin/clientlist');
			}else{
				 return redirect()->back()->with('message', 'Client is not created. pls try again...');  
			}
		}else{
			$this->data['title'] = 'Add Coupon';
			return view('admin.addcoupon', $this->data);	
		}		
	}
	public function editclient(Request $request){
			$this->data['title'] = 'Edit Client';
			$this->data['client'] = $this->user->where('id',$request->id)->first();
			$this->data['role'] = $this->role->where('status',0)->get();
			return view('admin.addclient', $this->data);			
	}
	public function deleteclient(Request $request){
			$this->user->where('id',$request->id)->delete();
			return redirect()->back()->with('message', 'Client has been sucessfully deleted..');  			
	}
}
