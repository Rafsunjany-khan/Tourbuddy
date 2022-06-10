
@extends('frontend.frontend_master')
@section('content')
{!! Toastr::message() !!}
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
  color: #111213;;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
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
         <li ><a href="{{url('/traveler/chnage-pass')}}">Change Password</a></li>  
        <li ><a href="{{url('/traveler/logout')}}">LogOut</a></li> 
      </ul><br>
      
    </div>

    <div class="col-sm-9">
    	      <div class="col-md-12">
            <div class="card" style="background: #f3e3e3;">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
			        <thead>
			                    <tr>
			                      <th scope="col">SL</th>
                            <th scope="col">image</th>
			                      <th scope="col">Title</th>
			                       <th scope="col">Details</th>
			                      <th scope="col">Status</th>
			                      <th scope="col">Action</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@php $i=1; @endphp
			                  	@foreach($blog as $data)
			                    <tr>
			                      <td>{{$i++}}</td>
                            <td><img src="{{asset('public/travelers/'.$data->blog_image)}}" height="40px" width="50px"></td>
			                      <td>

                    <a href="{{url('/blog/'.$data->id)}}" class="course-titlegulp-wrapper">
                                      <h3 class="course-title">{{$data->title}}</h3>
                                    </a>
                                  </td>
                            <td> {!! mb_strimwidth("$data->details", 0, 100, "...") !!} </td>			                      
			                      <td>
			                      	@if($data->status=='active')
			                      <div class="badge badge-success">active</div>
                               		 @else
                              	  <div class="badge badge-danger">pending </div>

			                      	@endif

			                      </td>
			                      <td>
			                      	<a href="{{url('/traveler/blog/edit/'.$data->id)}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
			                      	<a href="{{url('/traveler/blog/delete/'.$data->id)}}" onclick="return confirm('Are You Sure to Delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
			                      	
			                      </td>
			                    </tr>
			                    @endforeach
			                    
			                  </tbody>
			                </table>
			            </div>
			        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection
