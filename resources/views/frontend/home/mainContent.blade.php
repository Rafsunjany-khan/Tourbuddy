@extends('frontend.frontend_master')
@section('content')
{!! Toastr::message() !!}
<!--w3l-banner-slider-main-->
<section class="w3l-banner-slider-main">

	<div class="bannerhny-content">
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
						<input type="search" name ="search" placeholder="Search Here..." required="required" name="search">
						<button type="submit"><span class="fa fa-search" aria-hidden="true"></span></button>
					</form>
				</div>
			</nav>
			<!--//nav-->
		</header>

		<!--/banner-slider-->
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				@foreach($sliders as $key=>$slider)
				<li data-target="#carouselExampleIndicators" class="{{$key == 0 ? 'active' : '' }}" data-slide-to="{{$key}}" ></li>
				@endforeach
				
			</ol>
			<div class="carousel-inner">
				@foreach($sliders as $key=>$slider)
				<div class="carousel-item {{$key == 0 ? 'active' : '' }}" style="background: url({{asset('public/images/'.$slider->slider_image)}})">
					<div class="container">
						<div class="carousel-caption">

							<h3>{{$slider->slider_title}}</h3>
							<p>{{$slider->slider_slugan}}</p>
							<div class="button-4 mx-auto">
								<div class="eff-4"></div>
								<a href=""> Join Now</a>
							  </div>							
						</div>
					</div>
				</div>
				
				@endforeach

			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

	</div>
	<!--//banner-slider-->

</section>
<!-- //w3l-banner-slider-main -->
<section class="w3l-content-6">
	<!-- /content-6-section -->
	<div class="content-6-mian py-5">
		<div class="container py-lg-5">

			<div class="row title-content">
				<div class="col-lg-4 title-left">
					<h3 class="hny-title">{{$bannertext->title}}</h3>
				</div>
				<div class="col-lg-8 title-info">
					<p>{{$bannertext->details}}</p>
				</div>
			</div>

			<div class="content-info-in row mt-md-5 mt-4">
				@foreach($banner as $data)
				<div class="col-lg-3 col-md-6 imghrs">
					<a class="imghr" href="#"><img src="{{asset('public/images/'.$data->image)}}" class="img-fluid" alt="">
						<div class="details"><span class="title">{{$data->title}}</span></div>
					</a>
				</div>
				@endforeach
			</div>



		</div>

	</div>
	</div>
</section>


<section class="w3-gallery">
	<div class="porfolio-inf py-5">
		<div class="container pt-lg-5 pb-lg-4">
			<div class="row title-content">
				<div class="col-lg-4 title-left">
					<h3 class="hny-title">See lastest Post</h3>
				</div>
				<div class="col-lg-8 title-info">
					<!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae eligendi minima accusantium
						reiciendis, cupiditate optio corrupti quis quam at!.Duis aute irure dolor in reprehenderit in
						voluptate velit esse cillum.</p> -->
				</div>
			</div>
			
			

			<div class="row">
				@foreach($post as $data)
				<div class="col-md-3 filter photo" style="height: 320px">
					<div class="each-item" >
						<a href="{{url('/post/'.$data->id)}}"><img class="port-image img-fuild" src="{{asset('public/travelers/'.$data->image)}}" height="160px" alt="" /></a>

					</div>
					<div class="course-content">
						<div class="course-info">
							<h6><a class="course-instructor" href="#">{{$data->name}}</a></h6>
							<a href="{{url('/post/'.$data->id)}}" class="course-titlegulp-wrapper">
								<h3 class="course-title" data-gal="prettyPhoto[gallery]">{!! mb_strimwidth("$data->title", 0, 20, "...") !!}</h3>
							</a>
						</div>
						<div class="course-divider">
							<div class="course-meta grid"><span class="course-students" title=""><span
										class="fa fa-user" aria-hidden="true"></span> </span>
														<?php 
          
           $traveler_id= Session::get('traveler_id');
           if($traveler_id>0){?>
								<span class="course-reviews" title=""><span class="fa fa-plus"
										aria-hidden="true"></span> <a href="{{url('/traveler/connect/'.$data->id)}}">connect</a></span>
									<?php } ?>

							</div>
							<button class="price-course btn"> {{$data->amount}} </button>


						</div>
					</div>
				</div>
				@endforeach
				

				

			</div>
		</div>
		<!-- //gallery container -->
	</div>
</section>





<!-- //portfolio -->
<section class="w3l-apply-6">
	<!-- /apply-6-->
	<div class="apply-info py-5">
		<div class="container py-lg-5">
			<div class="apply-grids-info row">
				<div class="apply-gd-left col-lg-7">
						<label>Welcome Our TourBuddy</label>
						<h4>Apply for Travel guide</h4>
						
					<div class="row mt-lg-5 mt-4">
						<div class="col-md-6 sub-apply mt-4">
								<div class="apply-sec-info">
										<div class="appyl-sub-icon">
											<span class="fa fa-line-chart"></span>
										</div>
										<!-- <div class="appyl-sub-icon-info">
												<h5><a href="#">Empower Teachers</a></h5>
											<p>Lorem ipsum dolor sit amet,Ea consequuntur.</p>
										</div> -->
					
									</div>

						</div>
						<div class="col-md-6 sub-apply mt-4">
								<div class="apply-sec-info">
										<div class="appyl-sub-icon">
											<span class="fa fa-clock-o"></span>
										</div>
										<!-- <div class="appyl-sub-icon-info">
												<h5><a href="#">Lifetime access</a></h5>
											<p>Lorem ipsum dolor sit amet,Ea consequuntur.</p>
										</div> -->
					
									</div>
						</div>
					</div>
				</div>
				<div class="apply-gd-right col-lg-5 mt-lg-0 mt-5">
	
					<div class="apply-form p-md-5 p-4 mx-auto bg-white mw-100">
						<form action="{{url('/apply/guide')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label>Name</label>

								<input type="text" name="name" class="form-control"  placeholder=""
									required="">
							</div>
							<div class="form-group">
								<label>email</label>
								<input type="email" name="email" class="form-control"  placeholder=""
									required="">
							</div>
							<div class="form-group">
								<label>Area</label>
								<input type="text" name="area" class="form-control"  placeholder=""
									required="">
							</div>
							<div class="form-group mb-4">
								<label class="mb-2">Phone</label>
								<input type="number" class="form-control" name="phone" placeholder="" required="">
							</div>
							<div class="form-group mb-4">
								<label class="mb-2">Image</label>
								<input type="file" class="form-control" id="" name="guide_image" placeholder="" required="">
							</div>
							<div class="form-group mb-4">
								<label class="mb-2">CV</label>
								<input type="file" class="form-control" id="" name="cv" placeholder="" required="">
							</div>
							<button type="submit" class="btn btn-primary submit">Apply Now</button>

						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //apply-6-->
<!-- Blog -->
<section class="w3-gallery">
	<div class="porfolio-inf ">
		<div class="container pt-lg-5 pb-lg-4">
			<div class="row title-content">
				<div class="col-lg-4 title-left">
					
				</div>
				<div class="col-lg-8 title-info">
					<!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae eligendi minima accusantium
						reiciendis, cupiditate optio corrupti quis quam at!.Duis aute irure dolor in reprehenderit in
						voluptate velit esse cillum.</p> -->
				</div>
			</div>
			
			

			<div class="row">
				@foreach($blogs as $data)
				<div class="col-md-4 filter photo">
					<div class="each-item" style="height: 200px;">
						<a href="{{url('/blog/'.$data->id)}}"><img class="port-image img-fuild" src="{{asset('public/travelers/'.$data->blog_image)}}" alt="" /></a>

					</div>
					<div class="course-content">
						<div class="course-info">
							
							<a href="{{url('/blog/'.$data->id)}}" class="course-titlegulp-wrapper">
								<h3 class="course-title" data-gal="prettyPhoto[gallery]">{!! mb_strimwidth("$data->title", 0, 20, "...") !!}</h3>
							</a>
						</div>
						<!-- <div class="course-divider">
							<div class="course-meta grid"><span class="course-students" title=""><span
										class="fa fa-user" aria-hidden="true"></span> </span>
								<span class="course-reviews" title=""><span class="fa fa-plus"
										aria-hidden="true"></span> <a href="{{url('/traveler/connect/'.$data->id)}}">connect</a></span>

							</div>
							


						</div> -->
					</div>
				</div>
				@endforeach
				

				

			</div>
		</div>
		<!-- //gallery container -->
	</div>
</section>
<!-- end Blog -->
<section class="w3l-customers-6">
	<!--/customers -->
	<div class="customers-6-infhny py-5">
		<div class="container py-lg-5">

				
		  </div>
		<!--//customers -->
	</div>
</section>
<!-- //customers-6-->
@endsection