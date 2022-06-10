<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
class TravelerController extends Controller
{
    //
    public function index(){
    	return view('frontend.travelers.login');
    }
    public function notifaction(){
    	$traveler_id=Session::get('traveler_id');
    	
    }
}
