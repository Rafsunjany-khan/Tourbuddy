
@extends('frontend.frontend_master')
@section('content')
{!! Toastr::message() !!}
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
        <li > <a href="{{url('/travelers/'.Session::get('traveler_id'))}}">Profile</a></li> 
        <li ><a href="{{url('/traveler/desboard')}}">Create Post</a></li>      
        <li ><a href="{{url('/traveler/new_blog')}}">Create Blog</a></li>
        <li ><a href="{{url('/traveler/mypost')}}">My Post</a></li>
        <li ><a href="{{url('/traveler/myblog')}}">My Blog</a></li>
        <li ><a href="{{url('/traveler/updateProfile')}}">Update Profile</a></li>
        <li ><a href="{{url('/traveler/logout')}}">LogOut</a></li> 
      </ul><br>
      
    </div>

    <div class="col-sm-9">
            <h4><small>New Post</small></h4>
      <hr>
         <div class="col-md-12">
              <div class="card">
               

                  <div class="card-body" style="background: #f3e3e3;">
                      <form method="POST" action="{{url('/traveler/post/update') }}" enctype="multipart/form-data">
                          @csrf

                          <div class="form-group row">
                            

                              <div class="col-md-12">
                                  <label for="name">Tittle</label>
                                  <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$post->title}}" required autocomplete="name" autofocus required="">
                                  <input type="hidden" name="post_id" value="{{$post->id}}">

                              </div>
                              <div class="col-md-6">
                                  <label for="name">Start</label>
                                  <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="from"required autocomplete="name" autofocus  value="{{$post->place_from}}">
                           
                              </div>
                               <div class="col-md-6">
                                  <label for="name">End</label>
                                  <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="to" required autocomplete="name" autofocus  value="{{$post->place_to}}">
                           
                              </div>
                                 <div class="col-md-4">
                                  <label for="name">Budget</label>
                                  <input id="name" type="number" class="form-control @error('title') is-invalid @enderror" name="amount"  required autocomplete="name" autofocus value="{{$post->amount}}">
                           
                              </div>
                              
                              <div class="col-md-4">
                                  <label for="date_from">Date from</label>
                                  <input id="date_from" type="date" class="form-control @error('date_from') is-invalid @enderror" name="date_from"  required autocomplete="name" autofocus required="" value="{{$post->date_from}}">
                         
                                     
                              </div>
                              <div class="col-md-4">
                                <label for="name">Date To</label>
                                  <input id="date_to" type="date" class="form-control @error('date_to') is-invalid @enderror" name="date_to"  required autocomplete="name" autofocus required="" value="{{$post->date_to}}">

                                 
                              </div>
                               <div class="col-md-4">
                                 
                                   <label for="name">Please select your gender:</label> <br>
                                    <input type="radio" id="male" name="gender"<?php if( $post->gender=='male') echo "checked"; ?> value="male">
                                    <label for="male">Male</label><br>
                                    <input type="radio" id="female" name="gender" <?php if( $post->gender=='female') echo "checked"; ?> value="female">
                                    <label for="female">Female</label><br>
                                    <input type="radio" id="other" <?php if( $post->gender=='both') echo "checked"; ?>  name="gender"  value="both">
                                    <label for="other">Both</label>

                                    <br>  

                                    
                                </div>
                                 <div class="col-md-4">
                                  
                                    <label for="image">Photo</label>
                                  <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"   autocomplete="name" autofocus >
                                  <img src="{{asset('public/travelers/'.$post->image)}}" height="100px" width="200px">
                                    
                                </div>
                                <div class="col-md-4">
                                  <label for="name">Contact</label>
                                  <input id="name" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"  required autocomplete="name" autofocus required="" value="{{$post->contact}}">

                              </div>
                              <div class="col-md-12">
                                  <label for="name">Details</label>
                                  <div class="form-group mb-0">
                                          <div class="description-sm">
                                              <textarea id="editor1" name="details" cols="10" rows="4" required="">{{$post->details}}</textarea>
                                          </div>
                                      </div>
                                         
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

  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor')
    //bootstrap WYSIHTML5 - text editor
    
  })
</script>
@endsection

