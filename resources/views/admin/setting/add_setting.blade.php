@extends('admin.admin_master')
@section('mainContent')
   <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                   <h2>Company Setting</h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Setting</li>
                                <li class="breadcrumb-item active">Setting</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <form action="{{url('/admin/setting/add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row product-adding">
                    <div class="col-xl-6">
                        <div class="card">
                           
                            <div class="card-body">
                                <div class="digital-add needs-validation">
                                    <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="icon" class="col-form-label pt-0"><span>*</span>WebSite Icon</label> 
                                             
                                            <input class="form-control" name="web_icon" id="icon" type="file" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="web_name" class="col-form-label pt-0"><span>*</span> Website Name</label>
                                            <input class="form-control"  name="web_name" id="web_name" type="text" required="">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address" class="col-form-label"><span>*</span> Address</label>
                                        <input class="form-control"  name="web_address" type="text" id="address" required="" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city" class="col-form-label"><span>*</span> City</label>
                                        <input class="form-control" name="web_city" type="text" id="city" required="">
                                    </div>
                                   </div>
                                   <div class="col-md-6"> 
                                   <div class="form-group">
                                        <label for="email" class="col-form-label"><span>*</span> Email</label>
                                        <input class="form-control" name="web_email" type="email" id="email" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="telephone" class="col-form-label"><span>*</span> Telephone</label>
                                        <input class="form-control"  name="web_telephone" type="text" id="telephone" required="">
                                    </div>
                                   </div>
                                   <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="phone" class="col-form-label pt-0"><span>*</span>Phone</label>
                                        <input class="form-control" name="web_phone" id="phone" type="text" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_2" class="col-form-label pt-0"><span></span>Phone 2</label>
                                        <input class="form-control"  name="web_phone_2" id="phone_2" type="text" required="">
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
                                <h5>Website Logo</h5>
                            </div>
                            <div class="card-body">
                                <div class="digital-add needs-validation">
                                    
                                    <div class="form-group mb-0">
                                        <input class="form-control" name="web_logo" id="" type="file" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5>Short Description</h5>
                            </div>
                           <div class="card-body">
                                <div class="digital-add needs-validation">
                                    <div class="form-group mb-0">
                                        <div class="description-sm">
                                            <textarea id="editor" name="web_short_description" cols="10" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                   <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>

                </form>
            </div>
            <!-- Container-fluid Ends-->

        </div>

                                  
             <script type="text/javascript">
                $('document').ready(function(){
                    $('#setting').addClass('open active');
                    $('#update_setting').addClass('active');
                });
                                        
             </script>
		@endsection