<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guide;
class GuideController extends Controller
{
    //
     public function slider(){
    	$guides=Guide::where('status','active')->get();
    	return view('admin.guide.guide',['guides'=>$guides]);
    } 
       public function pendingGuide(){
    	$guides=Guide::where('status','deactive')->get();
    	return view('admin.pending.pending_guide',['guides'=>$guides]);
    }
       public function confirmGuide($id){
    	$guide=Guide::find($id);
    	$guide->status='active';
    	$guide->save();
    	return redirect('/admin/guide/all');
    	
    }
    
   public function storeSlider(Request $request){
	    	$image = $request->file('guide_image');
	    	$guide=new Guide;
	    	$guide->name=$request->name;
	    	$guide->designation=$request->area;
	    	$guide->phone=$request->phone; 	
	    	if($image){
		            $orginalname=$image->getClientOriginalName();
		            $str=str_replace(' ','-', $orginalname);
		            $name=time().'_'.$str;
		            $image->move(public_path('images'), $name);                     
		            $imageUrl =$name;
		           $guide->guide_image=$imageUrl;

		        }
		       
		    $guide->save();
		    return back();  
    }
    public function updateSlider(Request $request){
    		$image = $request->file('update_image');
	    	$guide=Guide::find($request->guide_id);
	    	$guide->name=$request->name;
	    	
	       	$guide->designation=$request->area;
	    	$guide->phone=$request->phone;
	    	if($image){
		            $orginalname=$image->getClientOriginalName();
		            $str=str_replace(' ','-', $orginalname);
		            $name=time().'_'.$str;
		            $image->move(public_path('images'), $name);                     
		            $imageUrl =$name;
		           $guide->guide_image=$imageUrl;

		        }
		    
		    $guide->save();
		    return back(); 
    }
    public function deleteGuide($id){
    	$guide=Guide::find($id);
    	$guide->delete();
    	return back();
    }
}
