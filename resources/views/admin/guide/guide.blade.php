@extends('admin.admin_master')
@section('mainContent')
   <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                   <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add guide</button>
                               
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Admin Panel</li>
                                <li class="breadcrumb-item active">guide</li>
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
								                <th>name</th>
                                                <th>Area</th>
                                                <th>Contact</th>			                
								                <th>Action</th>
								                
								            </tr>
								        </thead>
								        <tbody>
								        	@foreach($guides as $guide)
								            <tr>
								                <td>
                            
                                                <img src="{{asset('public/images/'.$guide->guide_image)}}" height="100px" width="100px" alt="guide Image">                        
                                                </td>
								                <td>{{$guide->name}}</td>
								                <td>{{$guide->designation}}</td>
                                                 <td>{{$guide->phone}}</td>
								              
								              
								                <td>
								<button type='button' class='btn btn-success btn-xs updatebtn' id='updatebtn' data-toggle="modal" data-target="#updateguide" data-name="{{$guide->name}}" data-area="{{$guide->designation}}" data-phone="{{$guide->phone}}" data-image="{{$guide->guide_image}}"  data-id="{{$guide->id}}"  ><i class='fa fa-edit'></i></button>
								                <a href="{{url('/admin/guide/delete/'.$guide->id)}}">	<button type='button' class='btn btn-danger btn-xs' onclick="return confirm('Are You sure')"><i class='fa fa-times'></i></buttpn></a>
                    
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
                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">New  guide</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="needs-validation" action="{{route('admin.guide.store')}}" enctype="multipart/form-data" method="post">
                                                    	@csrf
                                                        <div class="form">
                                                            <div class="form-group">
                                                                <label for="sl_title" class="mb-1">Name :</label>
                                                                <input class="form-control" id="sl_title" name="name" type="text" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="area" class="mb-1">Area :</label>
                                                                <input class="form-control" id="area" name="area" type="text" required="">
                                                            </div>
                                                           <div class="form-group">
                                                                <label for="phone" class="mb-1">Contact :</label>
                                                                <input class="form-control" id="phone" name="phone" type="text" required="">
                                                            </div>

                                                            
                                                        </div>
                                                            <div class="form-group mb-0">
                                                                <label for="guide_image" class="mb-1">guide Image :</label>
                                                                
                                                                <input class="form-control" name="guide_image" id="guide_image" type="file" required="">
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

                                      <div class="modal fade" id="updateguide" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Update guide Info</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="needs-validation" enctype="multipart/form-data" action="{{route('admin.guide.update')}}" method="post">
                                                        @csrf
                                                        <div class="form">
                                                            <div class="form-group">
                                                                <label for="guide_title" class="mb-1">Name :</label>
                                                                <input class="form-control" id="guide_title" name="name" type="text" required="">
                                                                <input class="form-control" id="guide_id" name="guide_id" type="hidden" >
                                                            </div>
                                                           <div class="form-group">
                                                                <label for="area" class="mb-1">Area :</label>
                                                                <input class="form-control" id="are_a" name="area" type="text" required="">
                                                            </div>
                                                           <div class="form-group">
                                                                <label for="phone" class="mb-1">Contact :</label>
                                                                <input class="form-control" id="phon_e" name="phone" type="text" required="">
                                                            </div>
                                                        
                                                        </div>
                                                            <div class="form-group mb-0">
                                                                <label for="image" class="mb-1">Guide Image :</label>
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
                                             $('#guide').addClass('active');
                                        })
                                        $('#example').on('click','.updatebtn',function(){
                                            var id      =$(this).data('id');
                                            var name    =$(this).data('name');
                                            var area      =$(this).data('area');
                                            var phone    =$(this).data('phone');
                                            var imgsrc  =$(this).data('image');

                                           
                                             $('#guide_id').val(id);
                                             $('#guide_title').val(name);
                                             $('#are_a').val(area);
                                             $('#phon_e').val(phone);
                                             $('#store_image').html("<img src={{asset('public/images/')}}/" + imgsrc + " width='100px' height='100px' />");

                                        })
                                    </script>
								@endsection