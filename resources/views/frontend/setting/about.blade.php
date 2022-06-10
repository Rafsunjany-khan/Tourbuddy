@extends('frontend.frontend_master')
@section('content')
<section class="w3l-banner-slider-main w3l-inner-page-main">
	<div class="breadcrumb-infhny">
		<header class="top-headerhny">
			<!--/nav-->
	<nav class="navbar navbar-expand-lg navbar-light fill">
				<div class="container-fluid">
					<a class="navbar-brand" href="">
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
          <h2 class="hny-title text-center">About Us</h2>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
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
							<div class="col-lg-6 mb-lg-0 mb-5">
								<h6></h6>
								<h3 class="hny-title">
									{{$about->title}}
									</h3>
								<p class="my-4">{{$about->des}}</p>
								
								
							</div>
							<div class="col-lg-6 welcome-image">
								<img src="{{asset('public/images/'.$about->about_image)}}" class="img-fluid" alt="" />
							</div>	
						
						</div>	
				 
				 </div>
			 </div>
	</section>
   <!-- //content-6-section -->

  

<!-- //specification-6-->
<!--  -->
   <!-- //content-6-section -->

  
	<!--/team-sec-->
	<section class="w3l-team-main">
		<div class="team py-5">
			<div class="container py-lg-5">
					<div class="row title-content">
							<div class="col-lg-4 title-left">
								<h3 class="hny-title">Expert Guide</h3>
							</div>
							<div class="col-lg-8 title-info">
								<!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae eligendi minima
									accusantium
									reiciendis, cupiditate optio corrupti quis quam at!.Duis aute irure dolor in reprehenderit
									in voluptate velit esse cillum.</p> -->
							</div>
						</div>
					<div class="row team-row">
						@foreach($guide as $data)
							<div class="col-lg-3 col-md-6 team-wrap">
									<div class="team-info text-center">
										<div class="column position-relative">
											<a href="#url"><img src="{{asset('public/images/'.$data->guide_image)}}" alt="" class="img-fluid team-image" /></a>
										</div>
										<div class="column">
											<h3 class="name-pos"><a href="#url">{{$data->name}}</a></h3>
											<p>Area:{{$data->designation}}</p>
											<p>Phone:{{$data->phone}}</p>
											<!-- <div class="social">
												<a href="#facebook" class="facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
												<a href="#twitter" class="twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
											</div> -->
									</div>
								</div>
							</div>
						@endforeach
							<!-- end team member -->
				
							
				</div>
			</div>
	</section>
@endsection