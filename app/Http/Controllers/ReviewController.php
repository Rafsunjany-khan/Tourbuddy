<?php

namespace App\Http\Controllers;
use App\Traveler;
use App\Connect;
use App\rating;
use Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;


class ReviewController extends Controller
{
    //
    public function index($post_id,$user_id){
        $is_exit_connect=Connect::where('post_id',$post_id)
            ->where('traveler_id',$user_id)
            ->first();
    	  $traveler=Traveler::find($user_id);
    	  $star_total=rating::where('member_id',$user_id)->get()->count();
    	  $start5_total=rating::where('member_id',$user_id)->where('rating',5)->get()->count();
    	  $start4_total=rating::where('member_id',$user_id)->where('rating',4)->get()->count();
    	  $start3_total=rating::where('member_id',$user_id)->where('rating',3)->get()->count();
    	  $start2_total=rating::where('member_id',$user_id)->where('rating',2)->get()->count();
    	  $start1_total=rating::where('member_id',$user_id)->where('rating',1)->get()->count();
        $completed_total=rating::get()
                        ->sum('rating');
                        // dd($completed_total);
                        $total_plus=$start5_total+$start4_total+$start3_total+$start2_total+$start1_total;
                        if($total_plus>0){
                            $percentage=(5*$start5_total+4*$start4_total+3*$start3_total+2*$start2_total+1*$start1_total)/$total_plus;  

                            }
                            else{
                            $percentage=0;
                            }

      return view('frontend.review.member_review',['start5_total'=>$start5_total,'start4_total'=>$start4_total,'start3_total'=>$start3_total,'start2_total'=>$start2_total,'start1_total'=>$start1_total,'star_total'=>$star_total,'percentage'=>$percentage,'traveler'=>$traveler,'post_id'=>$post_id,'member_id'=>$user_id,'is_exit_connect'=> $is_exit_connect]);
    }
    public function rating(Request $request){
    	try {
    		$id=Session::get('traveler_id');
            $is_exit=rating::where('post_id',$request->post_id)
            ->where('member_id',$request->member_id)
            ->where('given_by',$id)
            ->where('taken_by',$request->member_id)
            ->first();
            // dd($is_exit);
            if($is_exit){
               Toastr::error('You Are already Given', 'Review', ["positionClass" => "toast-top-right"]);
                  
            }else{
    	$rating=new rating;
    	$rating->post_id=$request->post_id;
    	$rating->member_id=$request->member_id;
    	$rating->rating=$request->stars;
        $rating->given_by=Session::get('traveler_id');
        $rating->taken_by=$request->member_id;
    	$rating->comment=$request->comment;
    	$rating->save();
    	Toastr::success('Success', 'Success', ["positionClass" => "toast-top-right"]);
    	
            }
            return back();
    	} catch (Exception $e) {
    		dd($e);
    	Toastr::success('Error', 'Error', ["positionClass" => "toast-top-right"]);
    		
    	}
    	
    }
}
