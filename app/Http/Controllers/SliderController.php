<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
class SliderController extends Controller
{
    //
   public function slider(){
    	$sliders=Slider::all();
    	return view('admin.setting.sliderinfo',['sliders'=>$sliders]);
    } 
   public function storeSlider(Request $request){
	    	$image = $request->file('slider_image');
	    	$slider=new Slider;
	    	$slider->slider_title=$request->slider_title;
	    	 $slider->slider_slugan=$request->slider_slugan; 	
	    	if($image){
		            $orginalname=$image->getClientOriginalName();
		            $str=str_replace(' ','-', $orginalname);
		            $name=time().'_'.$str;
		            $image->move(public_path('images'), $name);                     
		            $imageUrl =$name;
		           $slider->slider_image=$imageUrl;

		        }
		       
		    $slider->save();
		    return back();  
    }
    public function updateSlider(Request $request){
    		$image = $request->file('update_image');
	    	$slider=Slider::find($request->slider_id);
	    	$slider->slider_title=$request->slider_title;
	    	$slider->slider_slugan=$request->slider_slugan;
	       	
	    	if($image){
		            $orginalname=$image->getClientOriginalName();
		            $str=str_replace(' ','-', $orginalname);
		            $name=time().'_'.$str;
		            $image->move(public_path('images'), $name);                     
		            $imageUrl =$name;
		           $slider->slider_image=$imageUrl;

		        }
		    
		    $slider->save();
		    return back(); 
    }
    public function delete($id){
    	$slider=Slider::find($id);
    	$slider->delete();
    	return back();
    }
}
