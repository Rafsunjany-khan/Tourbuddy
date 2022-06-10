<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Post;
use App\Blog;
use App\Contact;
use View;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

          View::composer('frontend.inc.tr_header', function ($view) {
            $tr_id=Session::get('traveler_id');
            $tr_post=Post::where('traveler_id',$tr_id)->get();
            $contact=Contact::find(1);
             $view->with('tr_post', $tr_post);
             $view->with('contact', $contact);
         });
        View::composer('frontend.inc.footer', function ($view) {
            
            $lastest_post=Post::where('status','active')->orderby('id','DESC')->limit(2)->get();
            $lastest_blog=Blog::where('status','active')->orderby('id','DESC')->limit(2)->get();
            $contact=Contact::find(1);
             
             $view->with('contact', $contact);
             $view->with('lastest_post', $lastest_post);
             $view->with('lastest_blog', $lastest_blog);
         });
    }
}
