
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
  width: 100%;
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
  width: 100%;
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
            <form action="{{route('search')}}" method="post" class="d-flex searchhny-form">
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
<div class="container-fluid" style="padding:90px">
  <div class="row content">
    <div class="col-sm-3 sidenav">
     
       <ul class="footer-gd-16" style="padding: 20px;font-size: 20px">
       <li > <a href="{{url('/travelers/'.Session::get('traveler_id'))}}">Profile</a></li> 
        <li ><a href="{{url('/traveler/desboard')}}">Create Post</a></li>      
        <li ><a href="{{url('/traveler/new_blog')}}">Create Blog</a></li>
        <li ><a href="{{url('/traveler/mypost')}}">My Post</a></li>
        <li ><a href="{{url('/traveler/myblog')}}">My Blog</a></li>
        <li ><a href="{{url('/traveler/updateProfile')}}">Update Profile</a></li>
        <li ><a href="{{url('/traveler/chnage-pass')}}">Change Password</a></li>  
        <li ><a href="{{url('/traveler/logout')}}">LogOut</a></li> 
      </ul><br>
      
    </div>

    <div class="col-sm-9" style="">
      <h4><small>New Post</small></h4>
      <hr>
         <div class="col-md-12">
              <div class="card">
               

                  <div class="card-body" style="background: #f3e3e3;">
                      <form method="POST" action="{{url('/traveler/post/save') }}" enctype="multipart/form-data">
                          @csrf

                          <div class="form-group row">
                            

                              <div class="col-md-12">
                                  <label for="name">Tittle</label>
                                  <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="name" autofocus required="">

                                @if($errors->has('title'))                                    
                                      <div class="text-center alert alert-danger alert-dismissable">
                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">??</a>
                                          <b><i class="icon fa fa-warning"></i>{{$errors->first('title')}}</b> 
                                      </div>
                                      @endif
                              </div>
                               <div class="col-md-6">
                                  <label for="name">Start</label>
                                  <input id="name" type="number" class="form-control @error('from') is-invalid @enderror" name="from" value="{{ old('from') }}" required autocomplete="name" autofocus placeholder="From Dhaka">
                                @if($errors->has('from'))                                    
                                      <div class="text-center alert alert-danger alert-dismissable">
                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">??</a>
                                          <b><i class="icon fa fa-warning"></i>{{$errors->first('from')}}</b> 
                                      </div>
                                      @endif
                              </div>
                               <div class="col-md-6">
                                  <label for="name">End</label>
                                  <input id="name" type="number" class="form-control @error('to') is-invalid @enderror" name="to" value="{{ old('to') }}" required autocomplete="name" autofocus placeholder="Khulna">
                                @if($errors->has('to'))                                    
                                      <div class="text-center alert alert-danger alert-dismissable">
                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">??</a>
                                          <b><i class="icon fa fa-warning"></i>{{$errors->first('to')}}</b> 
                                      </div>
                                      @endif
                              </div>
                                 <div class="col-md-4">
                                  <label for="name">Budget</label>
                                  <input id="name" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="name" autofocus>
                                @if($errors->has('amount'))                                    
                                      <div class="text-center alert alert-danger alert-dismissable">
                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">??</a>
                                          <b><i class="icon fa fa-warning"></i>{{$errors->first('amount')}}</b> 
                                      </div>
                                      @endif
                              </div>
                              
                              <div class="col-md-4">
                                  <label for="date_from">Date from</label>
                                  <input id="date_from" type="date" class="form-control @error('date_from') is-invalid @enderror" name="date_from" value="{{ old('date_from') }}" required autocomplete="name" autofocus required="">
                                  @if($errors->has('date_from'))                                    
                                      <div class="text-center alert alert-danger alert-dismissable">
                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">??</a>
                                          <b><i class="icon fa fa-warning"></i>{{$errors->first('date_from')}}</b> 
                                      </div>
                                      @endif
                                     
                              </div>
                              <div class="col-md-4">
                                <label for="name">Date To</label>
                                  <input id="date_to" type="date" class="form-control @error('date_to') is-invalid @enderror" name="date_to" value="{{ old('date_to') }}" required autocomplete="name" autofocus required="">

                                  @error('title')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                               <div class="col-md-4">
                                 
                                   <label for="name">Please select your gender:</label> <br>
                                    <input type="radio" id="male" name="gender" value="male">
                                    <label for="male">Male</label><br>
                                    <input type="radio" id="female" name="gender" value="female">
                                    <label for="female">Female</label><br>
                                    <input type="radio" id="other" name="gender" checked="" value="both">
                                    <label for="other">Both</label>

                                    <br>  

                                    
                                </div>
                                 <div class="col-md-4">
                                 
                                    <label for="image">Photo</label>
                                  <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="name" autofocus required="">

                                    
                                </div>
                                <div class="col-md-4">
                                  <label for="name">Contact</label>
                                  <input id="name" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus required="">

                                  @error('phone')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-md-12">
                                  <label for="name">Details</label>
                                  <div class="form-group mb-0">
                                          <div class="description-sm">
                                              <textarea id="editor1" name="details" cols="10" rows="4" required=""></textarea>
                                          </div>
                                      </div>
                                       @if($errors->has('details'))                                    
                                      <div class="text-center alert alert-danger alert-dismissable">
                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">??</a>
                                          <b><i class="icon fa fa-warning"></i>{{$errors->first('details')}}</b> 
                                      </div>
                                      @endif
                              </div>
                          </div>


                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                     Submit
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
        </div>

      
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{asset('public/frontend/ckeditor/ckeditor.js')}}"></script>
<script>
function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("autoUpdate");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor')
    //bootstrap WYSIHTML5 - text editor
    
  })
</script>
@endsection
