@extends('admin.admin_master')
@section('mainContent')
   <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                  <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add banner</button> -->
                                  <h2>Banner Set Up</h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Admin Panel</li>
                                <li class="breadcrumb-item active">Banner</li>
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
								                <th>Title</th>
								                
								                <th>Action</th>
								                
								            </tr>
								        </thead>
								        <tbody>
								        	@foreach($banners as $banner)
								            <tr>
								                <td>
                            
                                                <img src="{{asset('public/images/'.$banner->image)}}" height="100px" width="100px" alt="banner Image">                        
                                                </td>
								                <td>{{$banner->title}}</td>
								                <td>
								<button type='button' class='btn btn-success btn-xs updatebtn' id='updatebtn' data-toggle="modal" data-target="#updatebanner" data-name="{{$banner->title}}"  data-image="{{$banner->image}}"  data-id="{{$banner->id}}"  ><i class='fa fa-edit'></i></button>
								               <!--  <a href="{{url('/admin/banner/delete/'.$banner->id)}}">	<button type='button' class='btn btn-danger btn-xs' onclick="return confirm('Are You sure')"><i class='fa fa-times'></i></buttpn></a> -->
                    
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

                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">New Product banner</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="needs-validation" action="{{route('admin.banner.store')}}" enctype="multipart/form-data" method="post">
                                                    	@csrf
                                                        <div class="form">
                                                            <div class="form-group">
                                                                <label for="banner_title" class="mb-1">Banner Title :</label>
                                                                <input class="form-control"  name="title" type="text" required="">
                                                            </div>
                                                           
                                                           
                                                            
                                                        </div>
                                                            <div class="form-group mb-0">
                                                                <label for="image" class="mb-1">Banner Image :</label>
                                                                
                                                                <input class="form-control" name="image" id="image" type="file">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
			                                                   
			                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                                 <button type="submit" class="btn btn-primary" type="button">Submit</button>
	                                               		 </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                      <div class="modal fade" id="updatebanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Update banner Info</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="needs-validation" enctype="multipart/form-data" action="{{route('admin.banner.update')}}" method="post">
                                                        @csrf
                                                        <div class="form">
                                                            <div class="form-group">
                                                                <label for="banner_title" class="mb-1">Title :</label>
                                                                <input class="form-control" id="banner_title" name="banner_title" type="text" required="">
                                                                <input class="form-control" id="banner_id" name="banner_id" type="hidden" >
                                                            </div>
                                                            
                                                        </div>
                                                            <div class="form-group mb-0">
                                                                <label for="image" class="mb-1">Banner Image :</label>
                                                                <span id="store_image"></span>
                                                             
                                                                <input class="form-control" name="update_image" id="image" type="file">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                               
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                                 <button type="submit" class="btn btn-primary" type="button">Update</button>
                                                         </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        $('document').ready(function(){
                                            $('#setting').addClass('open active');
                                             $('#banner').addClass('active');
                                        })
                                        $('#example').on('click','.updatebtn',function(){
                                            var id      =$(this).data('id');
                                            var name    =$(this).data('name');
                                            var slugan  =$(this).data('slugan');
                                            var link    =$(this).data('link');
                                            var imgsrc  =$(this).data('image');

                                           
                                             $('#banner_id').val(id);
                                             $('#banner_title').val(name);
                                            
                                             $('#store_image').html("<img src={{asset('public/images/')}}/" + imgsrc + " width='100px' height='100px' />");

                                        })
                                    </script>
								@endsection