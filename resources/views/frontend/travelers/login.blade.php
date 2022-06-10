
@extends('frontend.frontend_master')
@section('content')
<style type="">
	* {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
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
                      <li class="nav-item">
                        <a class="nav-link" href="{{url('/about')}}">About</a>
                      </li>
        
                      <li class="nav-item">
                        <a class="nav-link" href="{{url('/contact')}}">Contact</a>
                      </li>
            </ul>
            </div>
            <form action="#" method="post" class="d-flex searchhny-form">
              <input type="search" placeholder="Search Here..." required="required">
              <button type="submit"><span class="fa fa-search" aria-hidden="true"></span></button>
            </form>
          </div>
        </nav>
        <!--//nav-->
      </header>
      <!-- /breadcrumbs-->
      <div class="container">
          <nav aria-label="breadcrumb" class="breadcrumb-info">
            <h2 class="hny-title text-center"><?php 
           $travlers_name= Session::get('name'); echo $travlers_name;?></a></h2>
            <ol class="breadcrumb mb-0">
             
             
            </ol>
          </nav>
        </div>
            <!-- //breadcrumbs-->
    </div>
    <!--//banner-slider-->
  </section>
				<div class="w3_content_agilleinfo_inner">
					<div class="agile_featured_movies">
            @if(Session::has('exception'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('exception') }}</p>
          @endif
						<form action="{{url('/traveler/login')}}" method="post">
              @csrf
              <input type="hidden" value="{{isset($post_id) ? $post_id :''}}" name="redirect_post">
						  <div class="container">
						    <h1 class="text-center">Login</h1>
						  	<div style="width: 30%">
						    	<label for="email"><b>Enter Email   </b></label> 
						    </div>
						    <input type="text" placeholder="Enter Email" name="login_email" id="email" required>
						    <br>
						    <div style="width: 30%">
						    <label for="psw"><b>Password</b></label>
						    </div>
						    <input type="password" placeholder="Enter Password" name="login_password" id="psw" required>
						    <hr>
						    <button type="submit" class="registerbtn">Login</button>
						  </div>
						  <div class="container signin">
						    <p>creating an account you agree to our <a href="{{url('/travelers/registation')}}">Register</a>.</p>
						  </div>
						</form>
					</div>
				</div>


@endsection
