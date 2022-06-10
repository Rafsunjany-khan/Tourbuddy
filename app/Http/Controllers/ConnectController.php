<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Connect;
use Carbon\Carbon;
use App\Traveler;
use App\Post;
use Brian2694\Toastr\Facades\Toastr;
use Session;
class ConnectController extends Controller
{
    //
    public function connect($id){
    	$post_id=$id;
       $tr_id=Session::get('traveler_id');
    	if($tr_id>0){
        
        $traveler=Traveler::find($tr_id);
        $traveler_gender=$traveler->gender;
        $post=Post::find($id);
        $post_gender=$post->gender;
        $today=Carbon::now()->format('Y-m-d');
        if( $today< $post->date_from){

        $is_exit=Connect::where('post_id',$id)->where('traveler_id',$tr_id)->where('status','active')->first();
        if($is_exit){
            Toastr::error('You Are already Connected', 'Connected', ["positionClass" => "toast-top-right"]);
            
        }else{
              if($traveler_gender==$post_gender || $post->gender=="both"){
                $connect = new Connect;
                $connect->post_id=$id;
                $connect->traveler_id=$tr_id;
                $connect->save();
                 Toastr::success('You Are Connected', 'Success', ["positionClass" => "toast-top-right"]);
                }else{
                    Toastr::error('You Are not alow', 'Gender', ["positionClass" => "toast-top-right"]);
            }
    	}
        return back();
    }else{
        Toastr::error('Date Expired', 'Expired', ["positionClass" => "toast-top-right"]);
        return back();

    }
    }else{
    	// return redirect('/travelers/login');
         // Toastr::error('Please Login', 'Login', ["positionClass" => "toast-top-right"]);
         // return back();
         return view('frontend.travelers.login',['post_id'=>$id]);
    }
    }

    public function connectPost(Request $request){
    
            $id=$request->id;


         $tr_id=Session::get('traveler_id');
        if($tr_id>0){
        
        $traveler=Traveler::find($tr_id);
        $traveler_gender=$traveler->gender;
        $post=Post::find($id);
        $post_gender=$post->gender;
        $today=Carbon::now()->format('Y-m-d');
        if( $today< $post->date_from){

        $is_exit=Connect::where('post_id',$id)->where('traveler_id',$tr_id)->where('status','active')->first();
        if($is_exit){
            Toastr::error('You Are already Connected', 'Connected', ["positionClass" => "toast-top-right"]);
            
        }else{
              if($traveler_gender==$post_gender || $post->gender=="both"){
                $connect = new Connect;
                $connect->post_id=$id;
                $connect->traveler_id=$tr_id;
                $connect->save();
                 Toastr::success('You Are Connected', 'Success', ["positionClass" => "toast-top-right"]);
                }else{
                    Toastr::error('You Are not alow', 'Gender', ["positionClass" => "toast-top-right"]);
            }
        }
        return redirect('/post');
    }else{
        Toastr::error('Date Expired', 'Expired', ["positionClass" => "toast-top-right"]);
        return redirect('/post');

    }
    }else{
        return redirect('/travelers/login');
    }
    }
    
}
