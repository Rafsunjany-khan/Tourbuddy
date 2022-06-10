<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/','frontendController@index');
Route::get('/blog','frontendController@allBlogPost');
Route::post('/search','frontendController@search')->name('search');
Route::post('/traveler/connect/post','ConnectController@connectPost')->name('connect.search.post');
Route::get('/search/{data}','frontendController@search');
Route::get('/blog/{id}','frontendController@singleblog');
Route::get('/post','frontendController@allpost');
Route::post('/post','frontendController@allpost');
Route::get('/travelers','frontendController@members');
Route::get('/traveler/connect/{id}','ConnectController@connect');
Route::get('/post/{id}','frontendController@singlepost');
Route::get('/post/post-delete/{id}','travelersController@deletePost');
Route::get('/about','frontendController@about');
Route::get('/contact','frontendController@contact');
Route::get('/travelers/login','TravelerController@index');
Route::get('/travelers/registation','travelersController@registation');
Route::post('/traveler/save','travelersController@saveData');
Route::post('/traveler/login','travelersController@traveler_login');
Route::get('/traveler/desboard','travelersController@travelerDesboard');
Route::get('/admin/traveler/delete/{id}','travelersController@deleteT');
Route::get('/traveler/create-post','travelersController@createPost');
Route::get('/traveler/post/edit/{id}','travelersController@editPost');
Route::post('/traveler/post/update','travelersController@update');
Route::post('/traveler/post/save','travelersController@savePost');
Route::get('/traveler/mypost','travelersController@mypost');
Route::get('/traveler/new_blog','travelersController@newBlog');
Route::post('/traveler/blog/save','travelersController@saveBlog');
Route::get('/traveler/myblog','travelersController@myblog');
Route::get('/traveler/blog/edit/{id}','travelersController@editBlog');
Route::post('/traveler/blog/update','travelersController@updateBlog');
Route::get('/traveler/blog/delete/{id}','travelersController@deleteBlog');
Route::get('/travelers/post/{id}','frontendController@singlePost');
Route::get('/memeber/all','frontendController@allmember');
Route::get('/post/all','frontendController@allpost');
Route::get('/travelers/{id}','frontendController@travelers');
Route::get('/traveler/updateProfile','travelersController@updateProfile');
Route::post('/traveler/update-profile','travelersController@updateProfileStore');
Route::get('/traveler/chnage-pass','travelersController@changePass');
Route::post('/traveler/chnage-password','travelersController@changePassUpdate');
Route::get('/traveler/logout','travelersController@logout');
Route::post('/apply/guide','ApplyController@apply');
Route::get('/travelers/{post_id}/{user_id}','ReviewController@index');
Route::post('/travelers/rating','ReviewController@rating');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
Route::get('/admin', 'AdminController@index')->name('home');
Route::get('/admin/allpost','AdminController@index2')->name('allpost');
Route::get('/admin/pending/post','AdminController@pendingPost');
Route::get('/admin/post/view/{id}','AdminController@viewPost');
Route::get('/admin/all/post','AdminController@activePost');
Route::get('/admin/post/accept/{id}','AdminController@accept');
Route::get('/admin/travelers','AdminController@alltravelers')->name('alltravelers');
//slider controller
Route::get('/admin/setting/slider','SliderController@slider')->name('admin.setting.slider');
Route::post('/admin/setting/slider/new','SliderController@storeSlider')->name('admin.slider.store');
Route::post('/admin/setting/slider/update','SliderController@updateSlider')->name('admin.slider.update');

//Guide Controller
Route::get('/admin/guide/all','GuideController@slider')->name('admin.guide.all');

Route::get('/admin/pending/guide','GuideController@pendingGuide')->name('admin.guide.pendingGuide');
Route::get('/admin/guide/pending/{id}','GuideController@confirmGuide')->name('admin.guide.confirmGuide');
Route::post('/admin/guide/new','GuideController@storeSlider')->name('admin.guide.store');
Route::post('/admin/setting/guide/update','GuideController@updateSlider')->name('admin.guide.update');
Route::get('/admin/guide/delete/{id}','GuideController@deleteGuide');

Route::get('/admin/setting/banner','SettingController@banner')->name('admin.setting.banner');
Route::get('/admin/setting/bannerText','SettingController@bannertext')->name('admin.setting.bannerText');
Route::post('/admin/setting/update/bannertext','SettingController@updatebannertext');
Route::post('/admin/setting/banner/store','SettingController@createBanner')->name('admin.banner.store');
Route::post('/admin/setting/banner/update','SettingController@updateBanner')->name('admin.banner.update');

Route::get('/admin/about-us','SettingController@aboutus');
Route::get('/admin/contact','SettingController@contact');
Route::post('/admin/setting/update','SettingController@updateContact');
Route::post('/admin/about/update','SettingController@updateAbout');
Route::get('/admin/slider/delete/{id}','SliderController@delete');

});

