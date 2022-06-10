@extends('admin.admin_master')
@section('mainContent')
   <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                   <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add slider</button>
                               
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Admin Panel</li>
                                <li class="breadcrumb-item active">slider</li>
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
								                <th>Slugan</th>
                                                							                
								                <th>Action</th>
								                
								            </tr>
								        </thead>
								        <tbody>
								        	@foreach($sliders as $slider)
								            <tr>
								                <td>
                            
                                                <img src="{{asset('public/images/'.$slider->slider_image)}}" height="100px" width="100px" alt="slider Image">                        
                                                </td>
								                <td>{{$slider->slider_title}}</td>
								                <td>{{($slider->slider_slugan)}}</td>
								              
								              
								                <td>
								<button type='button' class='btn btn-success btn-xs updatebtn' id='updatebtn' data-toggle="modal" data-target="#updateslider" data-name="{{$slider->slider_title}}" data-slugan ="{{$slider->slider_slugan}}"  data-image="{{$slider->slider_image}}"  data-id="{{$slider->id}}"  ><i class='fa fa-edit'></i></button>
								                <a href="{{url('/admin/slider/delete/'.$slider->id)}}">	<button type='button' class='btn btn-danger btn-xs' onclick="return confirm('Are You sure')"><i class='fa fa-times'></i></buttpn></a>
                    
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
                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">New  slider</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="needs-validation" action="{{route('admin.slider.store')}}" enctype="multipart/form-data" method="post">
                                                    	@csrf
                                                        <div class="form">
                                                            <div class="form-group">
                                                                <label for="sl_title" class="mb-1">slider Title :</label>
                                                                <input class="form-control" id="sl_title" name="slider_title" type="text" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="slider_slugan" class="mb-1">slugan :</label>
                                                                <input class="form-control" id="slider_slugan" name="slider_slugan" type="text" required="">
                                                            </div>
                                                           
                                                           
                                                            
                                                        </div>
                                                            <div class="form-group mb-0">
                                                                <label for="slider_image" class="mb-1">slider Image :</label>
                                                                
                                                                <input class="form-control" name="slider_image" id="slider_image" type="file" required="">
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

                                      <div class="modal fade" id="updateslider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Update slider Info</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="needs-validation" enctype="multipart/form-data" action="{{route('admin.slider.update')}}" method="post">
                                                        @csrf
                                                        <div class="form">
                                                            <div class="form-group">
                                                                <label for="slider_title" class="mb-1">Title :</label>
                                                                <input class="form-control" id="slider_title" name="slider_title" type="text" required="">
                                                                <input class="form-control" id="slider_id" name="slider_id" type="hidden" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="slugan" class="mb-1">Slugan:</label>
                                                                <input class="form-control" id="slugan" name="slider_slugan" type="text" >
                                                            </div>
                                                        
                                                        </div>
                                                            <div class="form-group mb-0">
                                                                <label for="image" class="mb-1">slider Image :</label>
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
                                             $('#slider').addClass('active');
                                        })
                                        $('#example').on('click','.updatebtn',function(){
                                            var id      =$(this).data('id');
                                            var name    =$(this).data('name');
                                            var slugan  =$(this).data('slugan');
                                            var short_text    =$(this).data('short_text');
                                            var imgsrc  =$(this).data('image');

                                           
                                             $('#slider_id').val(id);
                                             $('#slider_title').val(name);
                                             $('#slugan').val(slugan);
                                             $('#short_text').val(short_text);
                                             $('#store_image').html("<img src={{asset('public/images/')}}/" + imgsrc + " width='100px' height='100px' />");

                                        })
                                    </script>
								@endsection