
@extends('frontend.frontend_master')
@section('content')
<style type="">
  * {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}



</style>
<div class="container-fluid" style="padding:90px">
  <div class="row content">
         <div class="wthree_agile-requested-movies">
                    @foreach($member as $memeber)
                    <div class="col-md-2 w3l-movie-gride-agile requested-movies">
                      <a href="{{url('/travelers/memeber/'.$memeber->id)}}" class="sweep-to-bottom"><img src="{{asset('public/travelers/'.$memeber->image)}}"class="img-responsive" alt=" "></a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                  <div class="w3l-movie-text">
                                    <h6><a href="single.html">{{$memeber->name}}</a></h6>             
                                  </div>
                                  <div class="mid-2 agile_mid_2_home">
                                   <!--  <p>{{$memeber->contact}} </p> -->
                                    <div class="block-stars">
                                      <ul class="w3l-ratings">
                                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                      </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                              
                    </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
  </div>
</div>


@endsection
