<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use Auth, Validator;
use App\User;
use App\Testimonials;
use App\Faqs;
use App\Categorys;
use App\Subcategorys;
use App\Cities;
use App\Banners;
use App\Cms;
use App\Contactus;
use App\Kycinformations;
use DB;
class PageController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
		$this->testimonials = new Testimonials();
		$this->faqs = new Faqs();
		$this->categorys = new Categorys();
		$this->subcategorys = new Subcategorys();
		$this->cities = new Cities();
		$this->banners = new Banners();
		$this->cms = new Cms();
		$this->contactus = new Contactus();
		$this->kycinformations = new Kycinformations();
    }    
	public function index(){
	
		$this->data['title'] = 'User';
		return view('admin.user', $this->data);
	}
	public function listtestimonials(){
	$this->data["testimonials"] = $this->testimonials->get();
	return view('admin.list-testimonials',$this->data);
	}
	public function addtestimonials(){
		
	return view('admin.add-testimonials');
	}
	public function savetestimonials(Request $request){
        if ($request->input("id") != 0) {
            $testimonials = Testimonials::where("id", $request->input("id"))->first();
        } else {
            $testimonials = new Testimonials();
        }
		if ($request->file('image')) {
			$image = $request->file('image');
			$images = 'image' . time() . '_' . $image->getClientOriginalName();
			$image_resize = Image::make($image->getRealPath());              
			$image_resize->save(storage_path('app/public/image/' .$images));
			$testimonials->image = $images;
		}		
        $testimonials->name = $request->input('name');		
		$testimonials->description = $request->input('description');
		$testimonials->status = $request->input('status');
        $testimonials->save();
		return redirect('/admin/list-testimonials')->with('message', 'Testimonials successfully created...');	
	}
     public function edittestimonials($id)
    {
        $this->data["testimonials"] = $this->testimonials->where("id", $id)->first();
        return view('admin.add-testimonials',$this->data);
    }
	public function deletetestimonials($id){
		$testimonials = $this->testimonials->where('id',$id)->delete();
		return redirect('/admin/list-testimonials');
	}
	public function listfaqs(){
	$this->data["faqs"] = $this->faqs->get();
	return view('admin.list-faqs',$this->data);
	}
	public function addfaqs(){
		
	return view('admin.add-faqs');
	}
	public function savefaqs(Request $request){
        if ($request->input("id") != 0) {
            $faqs = Faqs::where("id", $request->input("id"))->first();
        } else {
            $faqs = new Faqs();
        }
		if ($request->file('image')) {
			$image = $request->file('image');
			$images = 'image' . time() . '_' . $image->getClientOriginalName();
			$image_resize = Image::make($image->getRealPath());              
			$image_resize->save(storage_path('app/public/faqs/' .$images));
			$faqs->image = $images;
		}		
        $faqs->title = $request->input('title');		
		$faqs->description = $request->input('description');
		$faqs->status = $request->input('status');
        $faqs->save();
		return redirect('/admin/list-faqs')->with('message', 'Faq successfully created...');	
	}
     public function editfaqs($id)
    {
        $this->data["faqs"] = $this->faqs->where("id", $id)->first();
        return view('admin.add-faqs',$this->data);
    }
	public function deletefaqs($id){
		$faqs = $this->faqs->where('id',$id)->delete();
		return redirect('/admin/list-faqs');
	}
	public function listcategorys(){
	$this->data["categorys"] = $this->categorys->get();
	return view('admin.list-categorys',$this->data);
	}
	public function addcategorys(){
	
	return view('admin.add-categorys');
	}
	public function savecategorys(Request $request){
        if ($request->input("id") != 0) {
            $categorys = Categorys::where("id", $request->input("id"))->first();
        } else {
            $categorys = new Categorys();
        }
		if ($request->file('image')) {
			$image = $request->file('image');
			$images = 'image' . time() . '_' . $image->getClientOriginalName();
			$image_resize = Image::make($image->getRealPath());              
			$image_resize->save(storage_path('app/public/categorys/' .$images));
			$categorys->image = $images;
		}		
        $categorys->catname = $request->input('catname');		
		$categorys->meta_title = $request->input('meta_title');
		$categorys->meta_keyword = $request->input('meta_keyword');
		$categorys->meta_description = $request->input('meta_description');
		$categorys->status = $request->input('status');
        $categorys->save();
		return redirect('/admin/list-categorys')->with('message', 'Categorys successfully created...');	
	}
     public function editcategorys($id)
    {
        $this->data["categorys"] = $this->categorys->where("id", $id)->first();
        return view('admin.add-categorys',$this->data);
    }
	public function deletecategorys($id){
		$categorys = $this->categorys->where('id',$id)->delete();
		return redirect('/admin/list-categorys');
	}
	public function listsubcategorys(){
	$this->data["subcategorys"] = $this->subcategorys->with('getcategorys')->get();
	return view('admin.list-subcategorys',$this->data);
	}
	public function addsubcategorys(){
	$this->data["categorys"] = $this->categorys->get();		
	return view('admin.add-subcategorys',$this->data);
	}
	public function savesubcategorys(Request $request){
		// echo "<pre>"; print_r($request->input()); exit;
        if ($request->input("id") != 0) {
            $subcategorys = Subcategorys::where("id", $request->input("id"))->first();
        } else {
            $subcategorys = new Subcategorys();
        }
		if ($request->file('image')) {
			$image = $request->file('image');
			$images = 'image' . time() . '_' . $image->getClientOriginalName();
			$image_resize = Image::make($image->getRealPath());              
			$image_resize->save(storage_path('app/public/sub/' .$images));
			$subcategorys->image = $images;
		}	
        $subcategorys->cat_id = $request->input('cat_id');				
        $subcategorys->subcat_name = $request->input('subcat_name');		
		$subcategorys->meta_title = $request->input('meta_title');
		$subcategorys->meta_keyword = $request->input('meta_keyword');
		$subcategorys->meta_description = $request->input('meta_description');
		$subcategorys->status = $request->input('status');
        $subcategorys->save();
		return redirect('/admin/list-subcategorys')->with('message', 'Subcategorys successfully created...');	
	}
     public function editsubcategorys($id)
    {
        $this->data["subcategorys"] = $this->subcategorys->where("id", $id)->first();
	    $this->data["categorys"] = $this->categorys->get();		
        return view('admin.add-subcategorys',$this->data);
    }
	public function deletesubcategorys($id){
		$subcategorys = $this->subcategorys->where('id',$id)->delete();
		return redirect('/admin/list-subcategorys');
	}
	public function listcities(){
	$this->data["cities"] = $this->cities->get();
	return view('admin.list-cities',$this->data);
	}
	public function addcities(){
	
	return view('admin.add-cities');
	}
	public function savecities(Request $request){
        if ($request->input("id") != 0) {
            $cities = Cities::where("id", $request->input("id"))->first();
        } else {
            $cities = new Cities();
        }
		if ($request->file('image')) {
			$image = $request->file('image');
			$images = 'image' . time() . '_' . $image->getClientOriginalName();
			$image_resize = Image::make($image->getRealPath());              
			$image_resize->save(storage_path('app/public/categorys/' .$images));
			$cities->image = $images;
		}		
        $cities->city_name = $request->input('city_name');		
		$cities->status = $request->input('status');
        $cities->save();
		return redirect('/admin/list-cities')->with('message', 'Cities successfully created...');	
	}
     public function editcities($id)
    {
        $this->data["cities"] = $this->cities->where("id", $id)->first();
        return view('admin.add-cities',$this->data);
    }
	public function deletecities($id){
		$cities = $this->cities->where('id',$id)->delete();
		return redirect('/admin/list-cities');
	}
	public function listbanners(){
	$this->data["banners"] = $this->banners->get();
	return view('admin.list-banners',$this->data);
	}
	public function addbanners(){
		
	return view('admin.add-banners');
	}
	public function savebanners(Request $request){
        if ($request->input("id") != 0) {
            $banners = Banners::where("id", $request->input("id"))->first();
        } else {
            $banners = new Banners();
        }
		if ($request->file('image')) {
			$image = $request->file('image');
			$storeimages = 'coin' . time() . '_' . $image->getClientOriginalName();
			
			$image_resize = Image::make($image->getRealPath());              
			$image_resize->resize(300, 300);
			$image_resize->save(storage_path('app/public/banners/' .$storeimages));
			$banners->image = $storeimages;
		}
        $banners->title = $request->input('title');			
		$banners->name = $request->input('name');
		$banners->short_text = $request->input('short_text');
		$banners->description = $request->input('description');
		$banners->status = $request->input('status');
		$banners->save();
		return redirect('/admin/list-banners')->with('message', 'Topics successfully created...');
	}
     public function editbanners($id)
    {
        $this->data["banners"] = $this->banners->where("id", $id)->first();
        return view('admin.add-banners',$this->data);
    }
	public function deletebanners($id){
		$banners = $this->banners->where('id',$id)->delete();
		return redirect('/admin/list-banners');
	}
	public function listcms(){
	$this->data["cms"] = $this->cms->get();
	return view('admin.list-cms',$this->data);
	}
	public function addcms(){
	
	return view('admin.add-cms');
	}
	public function savecms(Request $request){
		//echo "<pre>"; print_r($request->input()); exit;
        if ($request->input("id") != 0) {
            $cms = Cms::where("id", $request->input("id"))->first();
        } else {
            $cms = new Cms();
        }
		if ($request->file('image')) {
			$image = $request->file('image');
			$images = 'image' . time() . '_' . $image->getClientOriginalName();
			$image_resize = Image::make($image->getRealPath());              
			$image_resize->save(storage_path('app/public/cms/' .$images));
			$cms->image = $images;
		}		
        $cms->title = $request->input('title');		
		$cms->description = $request->input('description');
		$cms->meta_title = $request->input('meta_title');
		$cms->meta_keyword = $request->input('meta_keyword');
		$cms->meta_description = $request->input('meta_description');
		$cms->status = $request->input('status');
        $cms->save();
		return redirect('/admin/list-cms')->with('message', 'Cms successfully created...');	
	}
     public function editcms($id)
    {
        $this->data["cms"] = $this->cms->where("id", $id)->first();
        return view('admin.add-cms',$this->data);
    }
	public function deletecms($id){
		$cms = $this->cms->where('id',$id)->delete();
		return redirect('/admin/list-cms');
	}
	public function listcontactus()
    {
        $this->data['contactus'] = $this->contactus->get();
        return view('admin.list-contactus',$this->data);
    }	
    public function savecontactus(Request $request)
    {
        if ($request->input("id") != 0) {
            $contactus = Contactus::where('id', $request->input('id'))->first();
        } else {
            $contactus = new Contactus();
        }
		
        $contactus->name = $request->input('name');
        $contactus->email = $request->input('email');
		 $contactus->mobile = $request->input('mobile');
		$contactus->message = $request->input('message');
        if ($contactus->save()) {
            return redirect('/contactus')->withErrors(['sucessfully updated',]);
        } else {
            return redirect('/contactus')->withErrors(['Failed']);
        }
    }
	public function deletecontactus($id){
		$contactus = $this->contactus->where('id',$id)->delete();
		return redirect('/admin/list-contactus');
	}
	public function listkycinformations()
    {
        $this->data['kycinformations'] = $this->kycinformations->get();
        return view('admin.list-kycinformations',$this->data);
    }
    public function savekycinformations(Request $request)
    {
        if ($request->input("id") != 0) {
            $kycinformations = Kycinformations::where('id', $request->input('id'))->first();
        } else {
            $kycinformations = new Kycinformations();
        }
		
        $kycinformations->aadharfront = $request->input('aadharfront');
        $kycinformations->aadharback = $request->input('aadharback');
		$kycinformations->aadharnumber = $request->input('aadharnumber');
		$kycinformations->panfront = $request->input('panfront');
		$kycinformations->panback = $request->input('panback');
		$kycinformations->pannumber = $request->input('pannumber');
        if ($kycinformations->save()) {
            return redirect('/list-kycinformations')->withErrors(['sucessfully updated',]);
        } else {
            return redirect('/list-kycinformations')->withErrors(['Failed']);
        }
    }
	public function deletekycinformations($id){
		$kycinformations = $this->kycinformations->where('id',$id)->delete();
		return redirect('/admin/list-contactus');
	}
	public function listuser(){
		$this->data['user'] = User::where('role',0)->get();
		return view('admin.list-user',$this->data);
	}
    public function saveuser(Request $request)
    {
        if ($request->input("id") != 0) {
           $user = User::where("id", $request->input("id"))->first();
        } else {
            $user = new User();
        }
		$user->dream_id = $request->input('dream_id');
		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->mobile = $request->input('mobile');
	    $user->bank_account = $request->input('bank_account');
        $user->amount = $request->input('amount');
        $user->save();
       return redirect('/admin/list-user')->with('message','List User successfully Save...');
    }
     public function edituser($id)
    {
        $this->data["users"] = $this->user->where("id", $id)->first();
        return view('admin.edit-user',$this->data);
    }
   
	public function deleteuser($id){
		$user = $this->user->where('id',$id)->delete();
		return redirect('/admin/list-user');
	}
}
