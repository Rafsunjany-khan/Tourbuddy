@extends('frontend.frontend_master')
@section('content')
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
  


<section class="w3l-services-2">
	<!-- /content-6-section -->
	<div class="services-2-mian py-5">
		<div class="container py-lg-5">
			<form action="{{url('/post')}}" method="post">
				@csrf
			<div class="row title-content">
				
				<div class="col-md-3"> 
					<label>From</label>
					<input type="date" name="start_date" class="form-control">
				</div>
				<div class="col-md-3">
					<label>To</label>
					<input type="date" name="end_date" class="form-control"></div>
				<div class="col-md-2"><label>Budget</label>
					<input type="number" name="budget" class="form-control"></div>
				
				<div class="col-md-1" style="padding-top: 9px;">
					<label></label>
					<button class="button btn-primary" type="submit">submit</button>
				</div>
			</div>
			</form>
			<div class="welcome-grids row">
				@foreach($post as $data)
				<div class="col-lg-4 col-md-6 course-grid" style="height: 320px;">
					<div class="course-grid-inf">
						<a href="{{url('/post/'.$data->id)}}"><img src="{{asset('public/travelers/'.$data->image)}}" height="160px" alt=""></a>
						<div class="course-content">
							<div class="course-info">
								<h6><a class="course-instructor" href="{{url('/post/'.$data->id)}}"> {{$data->name}}</a></h6>
								<a href="{{url('/post/'.$data->id)}}" class="course-titlegulp-wrapper">
									<h3 class="course-title">{!! mb_strimwidth("$data->title", 0, 20, "...") !!}</h3>
								</a>
							</div>
							<div class="course-divider">
								<div class="course-meta grid"><span class="course-students" title="">
									
										
			<?php 
          
           $traveler_id= Session::get('traveler_id');
           if($traveler_id>0){?>
									<span
											class="fa fa-user" aria-hidden="true"></span> </span>
											
									<span class="course-reviews" title=""><span class="fa fa-plus"
											aria-hidden="true"></span>
											<a href="{{url('/traveler/connect/'.$data->id)}}">connect</a></span>
										<?php } ?>

								</div>
								<button class="price-course btn"> {{$data->amount}} TK </button>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				
			</div>

			<!-- /pagination-->
			<!-- <div class="pagination p1">
				<ul>
					<a href="#">
						<li> <span class="fa fa-angle-double-left" aria-hidden="true"></span></li>
					</a>
					<a class="is-active" href="#">
						<li>1</li>
					</a>
					<a href="#">
						<li>2</li>
					</a>
					<a href="#">
						<li>3</li>
					</a>
					<a href="#">
						<li>4</li>
					</a>
					<a href="#">
						<li>5</li>
					</a>
					<a href="#">
						<li>6</li>
					</a>
					<a href="#">
						<li><span class="fa fa-angle-double-right" aria-hidden="true"></span></li>
					</a>
				</ul>
			</div> -->
			<!-- //pagination-->
		</div>
	</div>
</section>
@endsection