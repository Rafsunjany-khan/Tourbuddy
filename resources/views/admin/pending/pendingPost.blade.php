@extends('admin.admin_master')
@section('mainContent')
        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                           
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Post</li>
                                <li class="breadcrumb-item active">Pending post</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
           <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                        
                            <div class="card-body">                               
                                 
                               
                                <div class="table-responsive">
                                    <div id="basicScenario" class="product-physical"></div>
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
								        <thead>
								            <tr>
                                              <th scope="col">SL</th>
                                              <th scope="col">Title</th>
                                              <th scope="col">Start Date</th>
                                              <th scope="col">End Date</th>
                                              <th scope="col">amount</th>
                                              <th scope="col">contact</th>
                                              
                                                 <th scope="col">Detail</th>
                                                 <th scope="col">Status</th>
                                              <th scope="col">Action</th>
                                            </tr>
                              </thead>
                              <tbody>
                                @php $i=1; @endphp
                                @foreach($allpost as $allpost)
                                <tr>
                                  <td>{{$i++}}</td>
                                  <td>{{$allpost->title}}</td>
                                  <td>{{$allpost->date_from}}</td>
                                  <td>{{$allpost->date_to}}</td>
                                  <td>{{$allpost->amount}}</td>
                                  <td>{{$allpost->contact}}</td>
                                  <td>{!! mb_strimwidth("$allpost->details", 0, 100, "...") !!}</td>
                                  <td>
                                    @if($allpost->status=='active')
                                  <div class="badge badge-success">active</div>
                                     @else
                                  <div class="badge badge-danger">pending </div>

                                    @endif

                                  </td>
                                  <td>
                                    @if($allpost->status=='pending')
                                     <a href="{{url('/admin/post/accept/'.$allpost->id)}}" onclick="return confirm('Are You sure To Accept??')" class="btn btn-success btn-xs"><i class="fa fa-check" aria-hidden="true"></i></a>
                                     @endif
                                    <a href="{{url('/admin/post/view/'.$allpost->id)}}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                                    
                                    <a href="{{url('/post/post-delete/'.$allpost->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('Are You sure To Accept??')"><i class="fa fa-trash"></i></a>
                                    
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
            <!-- Container-fluid Ends-->
        </div>
<script type="text/javascript">
                                        $('document').ready(function(){
                                            $('#order').addClass('open active');
                                             $('#pending_order').addClass('active');
                                        })
                                    </script>
@endsection