@extends('frontend.frontend_master')
@section('content')
<!--/top-header-content-->

<!--//top-header-content-->

<!--w3l-banner-slider-main-->
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
            <h2 class="hny-title text-center">Contact</h2>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
          </nav>
        </div>
            <!-- //breadcrumbs-->
    </div>
    <!--//banner-slider-->
  </section>
  
<section class="w3l-contact-main w3l-contact3">
	<div class="contact1-bg py-5">
		<div class="container py-lg-5">
			<div class="row contact-main">
				<div class="grid col-lg-6">
					<div class="column">
						<h3 class="hny-title">How We Can Help</h3>
						<p class="head-main">For more info or inquiry about our products project, and pricing please feel free to
							get in touch with us.</p>
					</div>
					<div class="column2">
						<div class="contact-para contact-info-align">
							<div class="icon">
								<span class="fa fa-map-marker"></span>
							</div>
							<div>
								<strong class="info">Office Address :</strong class="info"> <p>#{{$contact->address}}</p>
							</div>
						</div>
						<div class="contact-info-align">
							<div class="icon">
								<span class="fa fa-phone"></span>
							</div>
							<div div class="icon-con-info">
							    <strong class="info">Phone :</strong class="info"> <a href="tel:+404 11-22-89"> {{$contact->phone}}</a>
						    </div>
						</div>
						<div class="contact-info-align">
							<div class="icon">
								<span class="fa fa-envelope-open-o"> </span>
							</div>
							<div>
							<strong class="info">Email Address :</strong> <a href="mailto:example@mail.com"> {{$contact->email}}</a>
						</div>
						</div>
					</div>
					<div class="column3">
						<h4 class="header">Follow us </h4>
						<a href="#facebook" class="facebook" title="facebook"><span class="fa fa-facebook"></span></a>
						<a href="#twitter" class="twitter" title="twitter"><span class="fa fa-twitter"></span></a>
						<a href="#linkedin" class="linkedin" title="linkedin"><span class="fa fa-linkedin"></span></a>
						<a href="#instagram" class="instagram" title="instagram"><span class="fa fa-instagram"></span></a>
					</div>
				</div>
				<div class="map col-lg-6">
					<iframe
						src="https://satellite-map.gosur.com/en/?q=Map%20Dhaka&gclid=CjwKCAiAxKv_BRBdEiwAyd40N26gjoDd5ilWCrqIp8eE_6RUj4w2fUouVaEFx4YfUDJgfFYcMLU8KxoClTkQAvD_BwE"
						frameborder="0" style="border:0" allowfullscreen=""></iframe>
				</div>
			</div>
		</div>
	</div>
<!-- 	<div class="contact-form py-5">
		<div class="container py-lg-5">
			<div class="contacts12-main">
				<h3 class="hny-title text-center">Get In Touch</h3>
				<form class="f-hnyv mt-md-5 mt-4" action="https://sendmail.w3layouts.com/submitForm" method="post">
					<div class="main-input">
						<div>
							<label class="field-info">Name <span class="compulsary">*</span></label>
							<input type="text" name="w3lName" id="w3lName" placeholder="Your Name" class="contact-input" />
						</div>
						<div>
							<label class="field-info">Email <span class="compulsary">*</span></label>
							<input type="email" name="w3lSender" id="w3lSender" placeholder="Your Email " class="contact-input" required />
						</div>
						<div>
							<label class="field-info">Subject <span class="compulsary">*</span></label>
							<input type="text" name="w3lSubject" id="w3lSubject" placeholder="Subject" class="contact-input" />
						</div>
					</div>
					<label class="field-info">Message <span class="compulsary">*</span></label>
					<textarea class="contact-textarea" name="w3lMessage" id="w3lMessage" placeholder="Type your message here" required></textarea>
					<div class="text-right">
						<button class="btn btn-contact">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div> -->
</section>
@endsection