@extends('frontend.frontend_master')
@section('content')
{!! Toastr::message() !!}
<style>
.checked {
  color: orange;
}
</style>
<style>
* {
  box-sizing: border-box;
}



.heading {
  font-size: 25px;
  margin-right: 25px;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

/* Individual bars */
.bar-5 {width: 60%; height: 18px; background-color: #4CAF50;}
.bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 15%; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}
</style>
								<style type="text/css">
									.rating {
  display: inline-block;
  position: relative;
  height: 50px;
  line-height: 50px;
  font-size: 50px;
}

.rating label {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  cursor: pointer;
}

.rating label:last-child {
  position: static;
}

.rating label:nth-child(1) {
  z-index: 5;
}

.rating label:nth-child(2) {
  z-index: 4;
}

.rating label:nth-child(3) {
  z-index: 3;
}

.rating label:nth-child(4) {
  z-index: 2;
}

.rating label:nth-child(5) {
  z-index: 1;
}

.rating label input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}

.rating label .icon {
  float: left;
  color: transparent;
}

.rating label:last-child .icon {
  color: #000;
}

.rating:not(:hover) label input:checked ~ .icon,
.rating:hover label:hover input ~ .icon {
  color: #09f;
}

.rating label input:focus:not(:checked) ~ .icon:last-child {
  color: #000;
  text-shadow: 0 0 5px #09f;
}
								</style>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
<section class="w3l-banner-slider-main w3l-inner-page-main">
	<div class="breadcrumb-infhny">
		<header class="top-headerhny">
			<!--/nav-->
	<nav class="navbar navbar-expand-lg navbar-light fill">
				<div class="container-fluid">
					<a class="navbar-brand" href="">
						<label class="lohny"><span class="fa fa-graduation-cap" aria-hidden="true"></span>Meet</label>UpBuddy</a>
					<!-- if logo is image enable this   
						<a class="navbar-brand" href="#index.html">
							<img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
						</a> -->
					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mx-lg-auto ml-auto">
							 <li class="nav-item active">
			                  <a class="nav-link" href="{{url('/')}}">Home</a>
			                </li>                
			                <li class="nav-item">
			                  <a class="nav-link" href="{{url('/post')}}">Post</a>
			                </li>
			                <li class="nav-item">
			                  <a class="nav-link" href="{{url('/blog')}}">Blog</a>
			                </li>
			                   <?php 
          
           $traveler_id= Session::get('traveler_id');
           if($traveler_id>0){?>
			                 <li class="nav-item">
			                  <a class="nav-link" href="{{url('/travelers')}}">Member</a>
			                </li>
			            <?php }?>
			                <li class="nav-item">
			                  <a class="nav-link" href="{{url('/about')}}">About</a>
			                </li>
			  
			                <li class="nav-item">
			                  <a class="nav-link" href="{{url('/contact')}}">Contact</a>
			                </li>
						</ul>

					</div>
					<form action="{{url('/search')}}" method="post" class="d-flex searchhny-form">
						@csrf
						<input type="search" name ="search" placeholder="Search Here..." required="required">
						<button type="submit"><span class="fa fa-search" aria-hidden="true"></span></button>
					</form>
				</div>
			</nav>
			<!--//nav-->
    </header>
    <!-- /breadcrumbs-->
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-info">
          <h2 class="hny-title text-center">{{$traveler->name}}</h2>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="index.html">Traveler</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$traveler->name}}</li>
          </ol>
        </nav>
      </div>
          <!-- //breadcrumbs-->
	</div>
	<!--//banner-slider-->
</section>
  <section class="w3l-wecome-content-6">
	<!-- /content-6-section -->
	 	 <div class="ab-content-6-mian py-5">
		  		
			 <div class="container py-lg-5">
					<div class="welcome-grids row">
							<div class="col-lg-6">
							<!-- 	<div class="col-lg-6 welcome-image" style="padding-left: 10%;">
								<img src="{{asset('public/travelers/'.$traveler->image)}}"  alt="" />
								</div> -->
								<div class="card">
								  <img src="{{asset('public/travelers/'.$traveler->image)}}" alt="John" style="width:100%">
								  <h1>{{$traveler->name}}</h1>
								  <p class="title">{{$traveler->email}}</p>
								  <p>{{$traveler->phone}}</p>
								 <p>Address: {{$traveler->address}}</p>
								<p>Gender: {{$traveler->gender}}</p>
								
								  <p><button></button></p>
								</div>
							</div>
							<div class="col-lg-6">
							@php
							$value=intval($percentage);
							 @endphp
							<span class="heading">Member Rating</span>
							@if (intval($percentage)==1) 
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							@endif
							@if (intval($percentage)==2) 
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							@endif
							@if (intval($percentage)==3) 
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							@endif
							@if (intval($percentage)==4) 
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							@endif
							@if (intval($percentage)==5) 
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							@endif

							<p>{{$percentage}} average based on {{$star_total}} reviews.</p>
							<hr style="border:3px solid #f1f1f1">

							<div class="row">
							  <div class="side">
							    <div>5 star</div>
							  </div>
							  <div class="middle">
							    
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							      <!-- <div class="bar-5"></div> -->
							   
							  </div>
							  <div class="side right">
							    <div>{{$start5_total}}</div>
							  </div>
							  <div class="side">
							    <div>4 star</div>
							  </div>
							  <div class="middle">
							 <span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							
							  </div>
							  <div class="side right">
							    <div>{{$start4_total}}</div>
							  </div>
							  <div class="side">
							    <div>3 star</div>
							  </div>
							  <div class="middle">
							     <span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							
							  </div>
							  <div class="side right">
							    <div>{{$start3_total}}</div>
							  </div>
							  <div class="side">
							    <div>2 star</div>
							  </div>
							  <div class="middle">
							 <span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							  </div>
							  <div class="side right">
							    <div>{{$start2_total}}</div>
							  </div>
							  <div class="side">
							    <div>1 star</div>
							  </div>
							  <div class="middle">
							       <span class="fa fa-star checked"></span>						
							  </div>
							  <div class="side right">
							    <div>{{$start1_total}}</div>
							  </div>
							</div>
							<hr>
							@if($is_exit_connect && $is_exit_connect->traveler_id != Session::get('traveler_id'))
							<h2>Give Your Rating</h2>

							<form  action="{{url('/travelers/rating')}}" method="post">
								<input type="hidden" name="post_id" value="{{$post_id}}">
								<input type="hidden" name="member_id" value="{{$member_id}}">

								@csrf
								<div class="rating">
								  <label>
								    <input type="radio" name="stars" value="1" />
								    <span class="icon">★</span>
								  </label>
								  <label>
								    <input type="radio" name="stars" value="2" />
								    <span class="icon">★</span>
								    <span class="icon">★</span>
								  </label>
								  <label>
								    <input type="radio" name="stars" value="3" />
								    <span class="icon">★</span>
								    <span class="icon">★</span>
								    <span class="icon">★</span>   
								  </label>
								  <label>
								    <input type="radio" name="stars" value="4" />
								    <span class="icon">★</span>
								    <span class="icon">★</span>
								    <span class="icon">★</span>
								    <span class="icon">★</span>
								  </label>
								  <label>
								    <input type="radio" name="stars" value="5" />
								    <span class="icon">★</span>
								    <span class="icon">★</span>
								    <span class="icon">★</span>
								    <span class="icon">★</span>
								    <span class="icon">★</span>
								  </label>
								  </div><br>
								
								 
								  <button class="btn btn-success pull-left" type="submit" style="width: 30%">Submit</button>
							</form>
							@endif
							</div>
							
								<hr>

								


						</div>
						
							
					<hr>
					<!-- My travel Place -->
								
				 
				 </div>
			 </div>
	</section>
	<script type="text/javascript">
		$(':radio').change(function() {
		  console.log('New star rating: ' + this.value);
		});
	</script>
@endsection