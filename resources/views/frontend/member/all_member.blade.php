@extends('frontend.frontend_master')
@section('content')<style>
.checked {
  color: orange;
}
</style>
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
            <h2 class="hny-title text-center">Members</h2>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Member</li>
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
			<div class="row title-content">
				
			</div>
			<div class="welcome-grids row">
				@foreach($all_members as $data)
				@php 

    	  $star_total=App\rating::where('member_id',$data->id)->get()->count();
    	  $start5_total=App\rating::where('member_id',$data->id)->where('rating',5)->get()->count();
    	  $start4_total=App\rating::where('member_id',$data->id)->where('rating',4)->get()->count();
    	  $start3_total=App\rating::where('member_id',$data->id)->where('rating',3)->get()->count();
    	  $start2_total=App\rating::where('member_id',$data->id)->where('rating',2)->get()->count();
    	  $start1_total=App\rating::where('member_id',$data->id)->where('rating',1)->get()->count();
        $completed_total=App\rating::get()
                        ->sum('rating');
                        // dd($completed_total);
						$total_plus=$start5_total+$start4_total+$start3_total+$start2_total+$start1_total;
						//dd($total_plus);

						if($total_plus>0){
		         $percentage=(5*$start5_total+4*$start4_total+3*$start3_total+2*$start2_total+1*$start1_total)/$total_plus;
		        }
		         if($total_plus>0){
		         $percentage=intval($percentage);
				 }
		         else{
		         $percentage=0;
		         }
				@endphp
				<div class="col-lg-3 col-md-4 ">
					<div>
						<a href="{{url('/travelers/'.$data->id)}}">
							<img src="{{asset('public/travelers/'.$data->image)}}" height="200px" width="200px"  alt="">
						</a>
						
						</div>
						<div>
							<h6 class="pull-left">
								

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
							@if (intval($percentage)==0) 
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							@endif
							</h6>
							
							<h6 class="text-center"><a class="course-instructor" href="{{url('/travelers/'.$data->id)}}"> {{$data->name}}</a></h6>
						</div>
						
					
						
							
						
					
				</div>
				@endforeach	
				

			<!-- /pagination-->
		<!-- 	<div class="pagination p1">
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