<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Guide;
use App\Traveler;
class AdminController extends Controller
{
    public function index2(){
    	$allpost=Post::all();
    	return view('allpost',['allpost'=>$allpost]);
    }
    public function pendingPost(){
        $allpost=Post::where('status','pending')->get();
        return view('admin.pending.pendingPost',['allpost'=>$allpost]);
    }
    public function activePost()
        {
         $allpost=Post::where('status','active')->get();
        return view('admin.pending.allPost',['allpost'=>$allpost]);
        } 
   public function accept($id){
    	$post=Post::find($id);
    	$post->status='active';
    	$post->save();
    	return back();
    }
    public function alltravelers(){

    	$alltravelers=Traveler::all();
    	return view('admin.travelers.travelers',['alltravelers'=>$alltravelers]);
    }
    
    public function index(){
        $totalPost=Post::where('status','active')->count();
        $totalPendingPost=Post::where('status','pending')->count();
        $totalPendingGuide=Guide::where('status','deactive')->count();
        $totalTraveler=Traveler::count();

        return view('admin.home.main',['totalPost'=>$totalPost,'totalPendingGuide'=>$totalPendingGuide,'totalTraveler'=>$totalTraveler,'totalPendingPost'=>$totalPendingPost]);
    }
    public function user(){
        return view('admin.user.newuser');
    }
    public function viewPost($id){
        $post=Post::where('id',$id)->first();
        return view('admin.post.viewPost',['post'=>$post]);
    }
    public function addUser(Request $request){
            $user=new User;
            $images = $request->file('image');
            $user->name=$request->name;
            $user->email=$request->email;
            $user->address=$request->address;
            $user->phone=$request->phone;
            $user->status=$request->status;
                    if($images){
                $orginalname=$images->getClientOriginalName();
                $str=str_replace(' ','-', $orginalname);
                $name=time().'_'.$str;
                $images->move(public_path('images'), $name);                     
                $imageUrl =$name;
                $user->image=$imageUrl;

            }
            $user->user_type=$request->user_type;
            $user->per_edit=$request->per_edit;
            $user->per_delete=$request->per_delete;
            $user->password=bcrypt($request->password);
            $user->save();
            return back();
    }
}
