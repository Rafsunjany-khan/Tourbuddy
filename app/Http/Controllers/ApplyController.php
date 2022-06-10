<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guide;
use Brian2694\Toastr\Facades\Toastr;
class ApplyController extends Controller
{
    //
    public function  apply(Request $request){
    	$image = $request->file('guide_image');
    	$cv=$request->file('cv');
    	// dd($cv);
	    	$guide=new Guide;
	    	$guide->name=$request->name;
	    	$guide->designation=$request->area;
	    	$guide->email=$request->email;
	    	$guide->phone=$request->phone; 	
	    	if($image){
		            $orginalname=$image->getClientOriginalName();
		            $str=str_replace(' ','-', $orginalname);
		            $name=time().'_'.$str;
		            $image->move(public_path('images'), $name);                     
		            $imageUrl =$name;
		           $guide->guide_image=$imageUrl;

		        }
		        if($cv){
		            $orginalname_cv=$cv->getClientOriginalName();
		            $cv_str=str_replace(' ','-', $orginalname_cv);
		            $cv_name=time().'_'.$cv_str;
		            $cv->move(public_path('images'), $cv_name);                     
		            $cvUrl =$cv_name;
		           $guide->cv=$cvUrl;

		        }
		       $guide->status='deactive';
		    $guide->save();
		     Toastr::success('You Are Successfully Applied', 'Successfully Applied', ["positionClass" => "toast-top-right"]);
		    return back();
    }
}
