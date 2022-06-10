<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Traveler;
use App\Slider;
use App\Blog;
use App\Guide;
use App\About;
use App\Contact;
use App\Banner;
use carbon\carbon;
use App\BannerText;
use App\rating;
use Session;
use DB;
class frontendController extends Controller
{
    public function index(){
    	$post=DB::table('posts')
                ->join('travelers','travelers.id','=','posts.traveler_id')
                ->where('posts.status','active')
                ->orderby('id','DESC')
                ->select('posts.*','travelers.name')                
                ->limit(12)
                ->get();

        $blogs=DB::table('blogs')
              ->where('status','active')
              ->orderby('id','DESC')
              ->select('blogs.*')
              ->limit(3)
              ->get();
        $banner=Banner::all();
        $bannertext=BannerText::where('id',1)->first();
        $sliders=Slider::all();
        $tr_id=Session::get('travler_id');
        $tr_post=Post::where('traveler_id',$tr_id)->get();
    	return view('frontend.home.mainContent',['bannertext'=>$bannertext,'banner'=>$banner,'post'=>$post,'sliders'=>$sliders,'blogs'=>$blogs,'tr_post'=>$tr_post]);
    }
    public function singlepost($id){
        $singlepost=Post::where('id',$id)->first();
        
        $connects=DB::table('connects')
                 ->join('travelers','travelers.id','=','connects.traveler_id')
                 ->where('connects.post_id',$id)
                 ->select('connects.*','travelers.name','travelers.image')
                 ->get();

    	return view('frontend.post.singlepost',['singlepost'=>$singlepost,'connects'=>$connects]);
    }
    public function singleblog($id){
        $singleblog=Blog::where('id',$id)->first();
        return view('frontend.blog.singleBlog',['singleblog'=>$singleblog]);
    }
      public function allpost(Request $request){
        $totalConnect = DB::table('connects')
                 ->select('post_id', DB::raw('count(*) as total'))
                 ->groupBy('post_id')
                 ->get();
            $start_date     =date('Y-m-d', strtotime($request->start_date));
            $end_date       =date('Y-m-d', strtotime($request->end_date));
            $today=Carbon::now()->format('Y-m-d');
            $plac=$request->place;
 
                 if ($request->start_date != "" && $request->end_date != "" && $request->budget != "") {
                     $post =DB::table('posts')
                            ->join('travelers','travelers.id','=','posts.traveler_id')
                            ->whereBetween('posts.date_from',[$start_date, $end_date])
                            ->where('posts.status','active')
                            ->where('posts.amount',$request->budget)
                            ->orderby('id','DESC')
                            ->select('posts.*','travelers.name')                
                            ->get();
                          
                     }else if($request->start_date != "" && $request->end_date != ""){
                        $post =DB::table('posts')
                            ->join('travelers','travelers.id','=','posts.traveler_id')
                            ->whereBetween('posts.date_from',[$start_date, $end_date])
                            ->where('posts.status','active')
                            ->orderby('id','DESC')
                            ->select('posts.*','travelers.name')                
                            ->get();
                     }else if($request->budget != ""){
                            $post =DB::table('posts')
                            ->join('travelers','travelers.id','=','posts.traveler_id')
                            ->where('posts.status','active')
                            ->where('posts.amount',$request->budget)
                            ->orderby('id','DESC')
                            ->select('posts.*','travelers.name')                
                            ->get();
                     }else{
                   $post =DB::table('posts')
                    ->join('travelers','travelers.id','=','posts.traveler_id')
                    ->where('posts.status','active')
                    ->where('posts.date_from','>',$today)
                    ->orderby('id','DESC')
                    ->select('posts.*','travelers.name')                
                    ->get();
                }
    	return view('frontend.post.post',['post'=>$post,'totalConnect'=>$totalConnect]);
    }
    public function allBlogPost(){
        $blog=DB::table('blogs')
            ->join('travelers','travelers.id','=','blogs.traveler_id')            
            ->where('blogs.status','active')
            ->select('blogs.*','travelers.name')   
            ->get();
        return view('frontend.blog.blog',['blog'=>$blog]);
    }
    public function allmember(){
    	$member=Traveler::where('status','active')->orderby('id','DESC')->get();
    	return view('frontend.traveler.alltravelers',['member'=>$member]);
    }
    public function about(){
        $about=About::find(1);
        $guide=Guide::where('status','active')->orderby('id','DESC')->get();
        return view('frontend.setting.about',['guide'=>$guide,'about'=>$about]);
    }
    public function contact(){
        $conact=Contact::find(1);
        return view('frontend.contact.contact',['contact'=>$conact]);
    }
    public function search(Request $request){
        $searchData= $request->search;
        $searchpost=DB::table('posts')
        
        ->join('travelers','travelers.id','=','posts.traveler_id')
        ->where('posts.status','active')               
    

        ->where('posts.title','like','%'.$searchData.'%')
        ->orWhere('posts.details', 'like', '%'.$searchData.'%')
        ->orWhere('posts.place_from', 'like', '%'.$searchData.'%')
        ->orWhere('posts.place_to', 'like', '%'.$searchData.'%')
        ->orderby('id','DESC')
        ->select('posts.*','travelers.name') 
        ->get();
        
        //dd($searchData);
        return view('frontend.post.searchPost',['post'=>$searchpost]);
    }
    public function travelers($id){
       
          $traveler=Traveler::find($id);
          $star_total=rating::where('member_id',$id)->get()->count();
          $start5_total=rating::where('member_id',$id)->where('rating',5)->get()->count();
          $start4_total=rating::where('member_id',$id)->where('rating',4)->get()->count();
          $start3_total=rating::where('member_id',$id)->where('rating',3)->get()->count();
          $start2_total=rating::where('member_id',$id)->where('rating',2)->get()->count();
          $start1_total=rating::where('member_id',$id)->where('rating',1)->get()->count();
          $completed_total=rating::get()
                        ->sum('rating');
                        $total_plus=$start5_total+$start4_total+$start3_total+$start2_total+$start1_total;
                         if($total_plus>0){
                            $percentage=(5*$start5_total+4*$start4_total+3*$start3_total+2*$start2_total+1*$start1_total)/$total_plus;  

                            }
                            else{
                            $percentage=0;
                            }
         
      return view('frontend.traveler.travelerProfile',['traveler'=>$traveler,'percentage'=>$percentage,'start5_total'=>$start5_total,'start4_total'=>$start4_total,'start3_total'=>$start3_total,'start2_total'=>$start2_total,'start1_total'=>$start1_total,'star_total'=>$star_total]);
         
    }
    public  function members(){
        $all_member=Traveler::where('status','active')->get();
        return view('frontend.member.all_member',['all_members'=>$all_member]);
    }
}
