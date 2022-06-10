@extends('admin.admin_master')
@section('mainContent')
   <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                   <h2>About Text</h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <!-- <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Setting</li>
                                <li class="breadcrumb-item active">Setting</li> -->
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <form action="{{url('/admin/about/update/')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row product-adding">
                    <div class="col-xl-6">
                        <div class="card">
                           
                            <div class="card-body">
                                <div class="digital-add needs-validation">
                                    <div class="row">
                                  
                                    
                                   
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address" class="col-form-label"><span>*</span> Title</label>
                                        <input class="form-control"  name="title" type="text" id="title" value="{{$aboutus->title}}" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <img src="{{asset('public/images/'.$aboutus->about_image)}}" height="200px" width="400px">
                                        <label for="address" class="col-form-label"><span>*</span> About Image</label>
                                        <input class="form-control"  name="update_image" type="file" id="title"  >
                                    </div>
                                </div>
                         
                                  </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-6">
                       
                        <div class="card">
                            <div class="card-header">
                                <h5>Short Description</h5>
                            </div>
                           <div class="card-body">
                                <div class="digital-add needs-validation">
                                    <div class="form-group mb-0">
                                        <div class="description-sm">
                                            <textarea id="editor" name="details" cols="10" rows="4">{{$aboutus->des}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                   <button type="submit" class="btn btn-primary pull-right">Update</button>
                </div>

                </form>
            </div>
            <!-- Container-fluid Ends-->

        </div>

                                  
             <script type="text/javascript">
                $('document').ready(function(){
                    $('#setting').addClass('open active');
                    $('#about_us').addClass('active');
                });
                                        
             </script>
        @endsection