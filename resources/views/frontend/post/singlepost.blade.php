@extends('frontend.frontend_master')
@section('content')
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>
{!! Toastr::message() !!}
<section class="w3l-banner-slider-main w3l-inner-page-main">
    <div class="breadcrumb-infhny">
      <header class="top-headerhny">
        <!--/nav-->
      <nav class="navbar navbar-expand-lg navbar-light fill">
				<div class="container-fluid">
					<a class="navbar-brand" href="index.html">
						<label class="lohny"><span class="fa fa-graduation-cap" aria-hidden="true"></span>Tour</label>Buddy</a>
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
            <h2 class="hny-title text-center">Post</h2>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Post</li>
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
			 	<a href="{{url('/traveler/connect/'.$singlepost->id)}}"><button class="btn btn-primary">Join Now</button></a> <br>
						<div class="welcome-grids row">

							<div class="col-lg-6 mb-lg-0 mb-5" style="padding-top: 10px;">
									

								<!-- <h6>{{$singlepost->title}}</h6> -->
								<!-- <h3 class="">
									{{$singlepost->date_to}} To 
									</h3>
									<h6><i class="fa fa-place"></i>{{$singlepost->place_from}} To {{ $singlepost->place_to}}</h2>
								<p> <i class="fa fa-phone"></i>{{$singlepost->contact}}</p>
								<p class="my-4">{!! $singlepost->details !!}</p> -->

								<table style="width:100%;padding-top: 10px;">
								  
								  
								  <tr>
								    <td>Title</td>
								    <td>{{$singlepost->title}}</td>
								  </tr>
								  <tr>
								    <td>Start Date</td>
								    <td>{{ $singlepost->date_from}}</td>
								  </tr>
								   <tr>
								    <td>End Date</td>
								    <td>{{ $singlepost->date_to}}</td>
								  </tr>
								   <tr>
								    <td>Start </td>
								    <td>{{$singlepost->place_from}}</td>
								  </tr>
								   <tr>
								    <td>Destination place</td>
								    <td>{{$singlepost->place_to}}</td>
								  </tr>
								  <tr>
								    <td>Contact</td>
								    <td>{{$singlepost->contact}}</td>
								  </tr>
								</table>
								
							</div>
							<div class="col-lg-6 welcome-image">
								<img src="{{asset('public/travelers/'.$singlepost->image)}}" class="img-fluid" width="100%" alt="" />
							</div>

						</div>
						<div class="welcome-grids row">
							<div class="col-lg-12 mb-lg-0 mb-5">
								<!-- <h6>{{$singlepost->title}}</h6>
								<h3 class="">
									{{$singlepost->date_to}} To {{ $singlepost->date_from}}
									</h3>
									<h6><i class="fa fa-place"></i>{{$singlepost->place_from}} To {{ $singlepost->place_to}}</h2>
								<p> <i class="fa fa-phone"></i>{{$singlepost->contact}}</p>
								<p class="my-4"></p> -->
								<!-- {!! $singlepost->details !!} -->
								
								
							</div>
								

						</div>
						<p class="my-4">{!! $singlepost->details !!}</p>
						<p>
							
						</p>
						<hr>
						   <?php 
           $travlers_name= Session::get('name');
           $traveler_id= Session::get('traveler_id');
           if($traveler_id>0){?>
						<h4>We Are Going To  There</h4>
						@foreach($connects as $cnntData)
							
							<ul style="padding: 3px;display: inline-block">
								<li style="display: inline-block;">
								<a href="{{url('/travelers/'.$cnntData->traveler_id)}}">	<img src="{{asset('public/travelers/'.$cnntData->image)}}" height="100px" width="100px" style="border-radius: 30px;" alt="" /> </a>
							<a href="{{url('/travelers/'.$singlepost->id.'/'.$cnntData->traveler_id)}}">	<p>{{$cnntData->name}}</p> </a>
								</li>
							</ul>
							
							@endforeach	
						<?php } ?>
				 
				 </div>
			 </div>
	</section>


@endsection