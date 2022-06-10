<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Brian2694\Toastr\Facades\Toastr;
use App\Traveler;
use App\Post;
use App\Blog;
use Validator;
use DB;
use Session;
class travelersController extends Controller
{
    public function index(){
    	return view('frontend.traveler.login');
    }
    public function registation(){
    	return view('frontend.traveler.ragistation');
    }
    public function saveData(Request $request){
    	$inputs=$request->except('_token');
        $Validator=Validator::make($inputs,[
            'name'=>'required|min:4',
            'email'=>'required|unique:travelers',
            'address'=>'required|min:4',
            'phone'=>'required|min:11',            
            'gender'=>'required',
            'image'=>'required',
            'password'=>'required|min:4|confirmed',
            
           
        ]);
        if($Validator->fails()){
            return redirect()->back()->withErrors($Validator)->withInput();
        }
        $file=$request->file('image');
        $traveler=new Traveler;
        $traveler->name=trim($inputs['name']);
       
        $traveler->email=trim($inputs['email']);
        $traveler->phone=trim($inputs['phone']);
        $traveler->gender=trim($inputs['gender']);
        $traveler->address=trim($inputs['address']);
        $traveler->password=bcrypt($inputs['password']);
      
        if($file){
                $orginalname=$file->getClientOriginalName();
                $str=str_replace(' ','-', $orginalname);
                $name=time().'_'.$str;
                $file->move(public_path('travelers'), $name);                     
                $imageUrl =$name;
                $traveler->image=$imageUrl; 
            }    
        $traveler->status='active';
        $traveler->save();
        $travler_id = $traveler->id;
        Session::put('travler_id', $travler_id);
        return redirect('/travelers/login');

    }
    public function createPost(){
        return view('frontend.traveler.post');
    }
    public function logout(){
        Session::flush();
        return redirect('/');
    }
       public function myPost(){
        $id=Session::get('traveler_id');
        $mypost=Post::where('traveler_id',$id)->get();
        return view('frontend.traveler.mypost',['mypost'=>$mypost]);
    }
      public function savePost(Request $request){
        $inputs=$request->except('_token');
        $Validator=Validator::make($inputs,[
            'title'=>'required|min:4',           
            'phone'=>'required|min:11',
            'details'=>'required|min:150',            
            'gender'=>'required',
            'image'=>'required',
            'from'=>'required|min:4',
            'to'=>'required|min:4',
            'date_from' => 'required|after:' . date('Y-m-d',strtotime('+1 day')),
          
           
        ]);
        if($Validator->fails()){
            return redirect()->back()->withErrors($Validator)->withInput();
        }
        
        $post=new Post;
        $post->title=trim($inputs['title']); 
        $post->amount=trim($inputs['amount']);        
        $post->contact=trim($inputs['phone']);
        $post->gender=trim($inputs['gender']);
        $post->date_to=trim($inputs['date_to']);      
        $post->date_from=$inputs['date_from'];
        $post->place_from=trim($inputs['from']);
        $post->place_to=trim($inputs['to']);
      $file=$request->file('image');
       
                $orginalname=$file->getClientOriginalName();
                $str=str_replace(' ','-', $orginalname);
                $name=time().'_'.$str;
                $file->move(public_path('travelers'), $name);                     
                $imageUrl =$name;
                $post->image=$imageUrl; 
          
       
        $post->details=trim($inputs['details']);
        $post->traveler_id=Session::get('traveler_id');
        Toastr::success('Post Create Succefully', 'Success', ["positionClass" => "toast-top-right"]);

        $post->save();
      
        return back();
    }
    public function editPost($id){
        $post=Post::find($id);
        return view('frontend.traveler.editPost',['post'=>$post]);
    }
    public function update(Request $request){
        $inputs=$request->except('_token');
    
        
        $post=Post::find($request->post_id);
        $post->title=trim($inputs['title']); 
        $post->amount=trim($inputs['amount']);        
        $post->contact=trim($inputs['phone']);
        $post->gender=trim($inputs['gender']);
        $post->date_to=trim($inputs['date_to']);      
        $post->date_from=$inputs['date_from'];
        $post->place_from=trim($inputs['from']);
        $post->place_to=trim($inputs['to']);

        $file=$request->file('image');
       if($file){
                $orginalname=$file->getClientOriginalName();
                $str=str_replace(' ','-', $orginalname);
                $name=time().'_'.$str;
                $file->move(public_path('travelers'), $name);                     
                $imageUrl =$name;
                $post->image=$imageUrl; 
          
       }
        $post->details=trim($inputs['details']);
        
        $post->save();
        Toastr::success('Post Update Succefully', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect('/traveler/mypost');
    }

    public function newBlog(){
        return view('frontend.traveler.newBlog');
    }
    public function saveBlog(Request $request){
        $inputs=$request->except('_token');
      
        
        $post=new Blog;
        $post->title=trim($inputs['title']);        
        $file=$request->file('image');       
                $orginalname=$file->getClientOriginalName();
                $str=str_replace(' ','-', $orginalname);
                $name=time().'_'.$str;
                $file->move(public_path('travelers'), $name);                     
                $imageUrl =$name;
                $post->blog_image=$imageUrl;           
       
        $post->details=trim($inputs['details']);
        $post->traveler_id=Session::get('traveler_id'); 
        $post->status='active';
        $post->save();

        Toastr::success('Blog Create Succefully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }
    public function myblog(){
        $blog=Blog::where('traveler_id',Session::get('traveler_id'))->get();
        return view('frontend.traveler.myblog',['blog'=>$blog]);
    }
    public function deleteBlog($id){

        $deleteBlog=Blog::find($id);
        $deleteBlog->delete();
        Toastr::success('Blog Delete Succefully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }
    public function updateProfile(){

        $profile=Traveler::find(Session::get('traveler_id'));
    return view('frontend.traveler.updateProfile',['profile'=>$profile]);
    }
    public function updateProfileStore(Request $request){

        $inputs=$request->except('_token');
        $Validator=Validator::make($inputs,[
            'name'=>'required|min:4',
            
            'address'=>'required|min:4',
            'phone'=>'required|min:11',            
            'gender'=>'required',
          
            
           
        ]);
        if($Validator->fails()){
            return redirect()->back()->withErrors($Validator)->withInput();
        }
        $file=$request->file('image');
        $traveler=Traveler::find(Session::get('traveler_id'));
        $traveler->name=trim($inputs['name']);
       
       
        $traveler->phone=trim($inputs['phone']);
        $traveler->gender=trim($inputs['gender']);
        $traveler->address=trim($inputs['address']);
        // $traveler->password=bcrypt($inputs['password']);
        if($file){
                $orginalname=$file->getClientOriginalName();
                $str=str_replace(' ','-', $orginalname);
                $name=time().'_'.$str;
                $file->move(public_path('travelers'), $name);                     
                $imageUrl =$name;
                $traveler->image=$imageUrl; 
            }    
        $traveler->status='active';
        $traveler->save();
        Toastr::success('Profile Update Succefully', 'Success', ["positionClass" => "toast-top-right"]);

       return back();
    }
    public function editBlog($id){
        $blog=Blog::find($id);
        return view('frontend.traveler.editBlog',['blog'=>$blog]);
    }
    public function updateBlog(Request $request){
          $inputs=$request->except('_token');
      
        
        $blog=Blog::find($request->blog_id);
        $blog->title=trim($inputs['title']);        
        $file=$request->file('image');      
        if($file){
                $orginalname=$file->getClientOriginalName();
                $str=str_replace(' ','-', $orginalname);
                $name=time().'_'.$str;
                $file->move(public_path('travelers'), $name);                     
                $imageUrl =$name;
                $blog->blog_image=$imageUrl;           
       }
        $blog->details=trim($inputs['details']);        
        $blog->save();
        return redirect('/traveler/myblog');
       
    }
    public function changePass(){
        return view('frontend.traveler.changePass');
    }
    public function changePassUpdate(Request $request){
        $inputs=$request->except('_token');
        $Validator=Validator::make($inputs,[
          
            'password'=>'required|min:4',
            
           
        ]);
        if($Validator->fails()){
            return redirect()->back()->withErrors($Validator)->withInput();
        }
      
        $traveler=Traveler::find(Session::get('traveler_id'));
      
         $traveler->password=bcrypt($inputs['password']);
      
        $traveler->save();
     
       Session::flush();
        return redirect('/travelers/login');
    }
    public function deleteT($id){
        $tr=Traveler::find($id);
        $tr->delete();
        return back();
    }
    public function deletePost($id){
        $bg=Post::find($id);
        $bg->delete();
        return back();  
    }
    public function travelerDesboard(){
        $id=Session::get('traveler_id');
        if(!$id){
            return Redirect::to('/travelers/login');
        }else{
            return view('frontend.traveler.travelerdesboard');
        }
    }
    public function traveler_login(Request $request){
        $email= $request->login_email;
        $password= $request->login_password;
        $result = DB::table('travelers')->where('email',$email)
             ->where('status','active')
            ->first();
            if($result){
            
    
                    if(Hash::check($password, $result->password))
                    {
                        Session::put('name',$result->name);
                        Session::put('traveler_id',$result->id);
                                    if($request->redirect_post >0){
                                        return redirect::to('/post/'.$request->redirect_post);
                                    }else{
                                return Redirect::to('/traveler/desboard');
                            }
                    }
                    session()->flash('exception', 'Your Username or Password is Invalid');
                    return Redirect::to('/travelers/login');
         }
                else{
                    session()->flash('exception', 'You are not a valid User!!');
                    return Redirect::to('/travelers/login');
                } 
            } 
    }

