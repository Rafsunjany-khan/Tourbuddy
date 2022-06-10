@extends('admin.admin_master')
@section('mainContent')
 <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/rating.css')}}">
 <!-- owlcarousel css-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/owlcarousel.css')}}">
   <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>post Detail
                                    <small>{{$post->title}}</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i data-feather="home"></i></a></li>
                               <!--  -->
                                <li class="breadcrumb-item active">post Detail</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="card">
                    <div class="row post-page-main card-body">
                        <div class="col-xl-4">
                            <img src="{{asset('public/travelers/'.$post->image)}}" alt="" height="200px" width="200px" class="blur-up lazyloaded">
                            <div class="post-slider owl-carousel owl-theme" id="sync1">
                             
                                <div class="item"><img src="{{asset('public/travelers/'.$post->image)}}" alt="" class="blur-up lazyloaded"></div>
                          
                            </div>
                            <div class="owl-carousel owl-theme" id="sync2">
                         
                                <div class="item"><img src="{{asset('public/travelers/'.$post->image)}}" alt="" class="blur-up lazyloaded"></div>
                              
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="post-page-details post-right mb-0">
                                <h2>{{$post->title}}</h2>
                                
                                <hr>
                                   <div class="post-price digits mt-2">
                                    <h3>{{$post->date_from}} To {{$post->date_to}}</h3>
                                </div>
                                
                          
                                <div class="add-post-form">
                                    <h6 class="post-title">Budget</h6>
                                    <p>{{$post->amount}}</p> TK
                                    
                                </div>
                                <hr>
                         
                                    <label></label>
                                     <h6 class="post-title">details</h6>
                                     <p>{!! $post->details !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>
        <script>
  $('documnet').ready(function(){
    $('#post').addClass('open active');
   
  })
</script>
        <!-- Owlcarousel js-->

@endsection