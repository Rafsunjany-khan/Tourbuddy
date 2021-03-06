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
                                <li class="breadcrumb-item">Traveler</li>
                                <li class="breadcrumb-item active">List Traveler</li>
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
								                <th>Image</th>
								                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone </th>
                                                <th>Address</th>
								                <th>Status</th>
								                <th>Action</th>
								                
								            </tr>
								        </thead>
								        <tbody>
								        	@foreach($alltravelers as $traveler)
								            <tr>
                                                <td><img src="{{asset('public/travelers/'.$traveler->image)}}" height="40px" width="50px"> </td>
								                <td>{{$traveler->name}}</td>
								                <td>{{$traveler->email}}</td>
                                                <td>{{$traveler->phone}}</td>
                                                <td>{{($traveler->address)}}</td>
								                
								                <td>
								                	<?php if($traveler->status=='active'){?>
								                		<div class='badge badge-success'>active</div>
								                	<?php }else{?>
								                		<div class='badge badge-danger'>inactive</div>
								                	<?php }?>
								                </td>
								                <td>
                                             
								            <!--     <a href="{{url('/admin/customer/edit/'.$traveler->id)}}">	<button type='button' style="line-height: 0.5; border-radius: 1.25rem;" class='btn btn-primary btn-xs updatebtn' id='updatebtn'><i class='fa fa-edit'></i></button>
                                                    </a> -->
								                <a href="{{url('/admin/traveler/delete/'.$traveler->id)}}">	<button type='button' style="line-height: 0.5; border-radius: 1.25rem;" class='btn btn-danger btn-xs' onclick="return confirm('Are You sure')"><i class='fa fa-times'></i></buttpn></a>
                    
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
                                            $('#product').addClass('open active');
                                             $('#productlist').addClass('active');
                                        })
                                    </script>
@endsection