<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BannerText;
use App\Banner;
use App\About;
use App\Contact;
class SettingController extends Controller
{
    //
    public function bannertext(){
    	$bannertext=BannerText::where('id',1)->first();
    	return view('admin.setting.bannertext',['bannertext'=>$bannertext]);
    }
    public function updatebannertext(Request $request){
    	$bannertext=BannerText::find(1);
    	$bannertext->title=$request->title;
    	$bannertext->details=$request->short_details;
    	$bannertext->save();
    	return back();
    }
    public function banner(){
    		$banners=Banner::all();
    		return view('admin.setting.bannerinfo',['banners'=>$banners]);
    }
    
    public function createBanner(Request $request){

	    	$image = $request->file('image');
	    	$banner=new Banner;
	    	$banner->title=$request->title;
	        	
	    	if($image){
		            $orginalname=$image->getClientOriginalName();
		            $str=str_replace(' ','-', $orginalname);
		            $name=time().'_'.$str;
		            $image->move(public_path('images'), $name);                     
		            $imageUrl =$name;
		           $banner->image=$imageUrl;

		        }
		      
		    $banner->save();
		    return back();    

    }
    public function updateBanner(Request $request){
	    	$image = $request->file('update_image');
	    	$banner=Banner::find($request->banner_id);    	
	    	$banner->title=$request->banner_title;
	    	   	
	    	if($image){
		            $orginalname=$image->getClientOriginalName();
		            $str=str_replace(' ','-', $orginalname);
		            $name=time().'_'.$str;
		            $image->move(public_path('images'), $name);                     
		            $imageUrl =$name;
		           	$banner->image=$imageUrl;

		        }
		      
		    $banner->save();
		    return back();
    }
    public function aboutus(){
    	$aboutus =About::find(1);
    	return view('admin.setting.about_us',['aboutus'=>$aboutus]);
    }
    public function contact(){
    	$setting =Contact::find(1);
    	return view('admin.setting.setting',['setting'=>$setting]);
    }
    public function updateContact(Request $request){
    		$setting=Contact::find(1);
    		$setting->address=$request->web_address;
    		$setting->city=$request->web_city;
    		$setting->email=$request->web_email;
    		$setting->telephone=$request->web_telephone;
    		$setting->phone=$request->web_phone;
    		$setting->phone_2=$request->web_phone_2;
    		
    		$setting->save();
    		return back();
    }
    public function updateAbout(Request $request){
    	$about=About::find(1);
    	$image = $request->file('update_image');
    	$about->title=$request->title;
    	$about->des=$request->details;
    	if($image){
		            $orginalname=$image->getClientOriginalName();
		            $str=str_replace(' ','-', $orginalname);
		            $name=time().'_'.$str;
		            $image->move(public_path('images'), $name);                     
		            $imageUrl =$name;
		           	$about->about_image=$imageUrl;

		        }
		      
    	$about->save();
    	return back();

    }
}
