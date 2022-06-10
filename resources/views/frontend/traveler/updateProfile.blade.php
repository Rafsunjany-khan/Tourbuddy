
@extends('frontend.frontend_master')
@section('content')
<style type="">
	* {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}

a {
  color: #111213;;
}

</style>
<style type="">
  * {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=password],input[type=number] {
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
  width: 10%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */


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
    <div class="col-sm-3 sidenav" style="background: #f30067;">
     
      <ul class="footer-gd-16" style="padding: 20px;font-size: 20px">
        <li ><a href="{{url('/traveler/desboard')}}">Profile</a></li> 
        <li ><a href="{{url('/traveler/desboard')}}">Create Post</a></li>      
        <li ><a href="{{url('/traveler/new_blog')}}">Create Blog</a></li>
        <li ><a href="{{url('/traveler/mypost')}}">My Post</a></li>
        <li ><a href="{{url('/traveler/myblog')}}">My Blog</a></li>
        <li ><a href="{{url('/traveler/updateProfile')}}">Update Profile</a></li>
        <li ><a href="{{url('/traveler/logout')}}">LogOut</a></li> 
      </ul><br>
      
    </div>

    <div class="col-sm-9">
            <h4><small>Update Profile</small></h4>
      <hr>
         <div class="col-md-12">
              <div class="card">
               

                  <div class="card-body" style="background: #f3e3e3;">
  <form action="{{url('/traveler/update-profile')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="container">
                
                
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter Your name"value="{{$profile->name}}" name="name" id="name" required>
                @if($errors->has('name'))                                    
                                    <div class="text-center alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <b><i class="icon fa fa-warning"></i>{{$errors->first('name')}}</b> 
                                    </div>
                                    @endif
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" value="{{$profile->email}}" name="email" id="email" required>
              @if($errors->has('email'))                                    
                                    <div class="text-center alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <b><i class="icon fa fa-warning"></i>{{$errors->first('name')}}</b> 
                                    </div>
                                    @endif
                <label for="phone"><b>Mobile</b></label>
                <input type="number" placeholder="01......" value="{{$profile->phone}}" name="phone" id="phone" required> <br>
                @if($errors->has('phone'))                                    
                                    <div class="text-center alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <b><i class="icon fa fa-warning"></i>{{$errors->first('phone')}}</b> 
                                    </div>
                                    @endif
                <label for="address"><b>Address</b></label>
                <input type="text" placeholder="Dhaka,Bangladesh" value="{{$profile->address}}" name="address" id="address" required> <br>
                 @if($errors->has('address'))                                    
                                    <div class="text-center alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <b><i class="icon fa fa-warning"></i>{{$errors->first('address')}}</b> 
                                    </div>
                                    @endif
                                   <label> <b>Please select your gender:</b></label> <br>
                                   <input type="radio" id="male" name="gender"<?php if($profile->gender=='male'){echo "checked";} ?> value="male">
                                  <label for="male">Male</label><br>
                                  <input type="radio" id="female" name="gender" <?php if($profile->gender=='female'){echo "checked";} ?> value="female">
                                  <label for="female">Female</label><br>               
                                  <label for="image"><b>Photo</b></label>
                                  <img src="{{asset('public/travelers/'.$profile->image)}}" height="50px" width="50px"> <br>
                                  <input type="file" placeholder="Enter Your name" name="image" id="image" > <br>
                                 <!--  <label for="psw"><b>Change Password</b></label>
                                  <input type="password" placeholder="chnage Password" name="password" id="psw" > -->
                                  

                <hr>
                <button type="submit" class="btn btn-success">Update</button>
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
