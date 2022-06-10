@extends('admin.admin_master')
@section('mainContent')
   <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                   <h2>Contact</h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                               
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <form action="{{url('/admin/setting/update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row product-adding">
                    <div class="col-xl-6">
                        <div class="card">
                           
                            <div class="card-body">
                                <div class="digital-add needs-validation">
                                    <div class="row">
                                    <div class="col-md-6">

                                     
                                    </div>
                                    
                                   
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address" class="col-form-label"><span>*</span> Address</label>
                                        <input class="form-control"  name="web_address" type="text" id="address" required="" value="{{$setting->address}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city" class="col-form-label"><span>*</span> City</label>
                                        <input class="form-control" value="{{$setting->city}}"  name="web_city" type="text" id="city" required="">
                                    </div>
                                   </div>
                                   <div class="col-md-6"> 
                                   <div class="form-group">
                                        <label for="email" class="col-form-label"><span>*</span> Email</label>
                                        <input class="form-control" value="{{$setting->email}}"  name="web_email" type="email" id="email" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="telephone" class="col-form-label"><span>*</span> Telephone</label>
                                        <input class="form-control" value="{{$setting->telephone}}" name="web_telephone" type="text" id="telephone" required="">
                                    </div>
                                   </div>
                                   <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="phone" class="col-form-label pt-0"><span>*</span>Phone</label>
                                        <input class="form-control" value="{{$setting->phone}}" name="web_phone" id="phone" type="text" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_2" class="col-form-label pt-0"><span></span>Phone 2</label>
                                        <input class="form-control" value="{{$setting->phone_2}}" name="web_phone_2" id="phone_2" type="text" required="">
                                    </div>
                                </div>
                         
                                  </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-6">
                     

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
                    $('#contact_us').addClass('active');
                });
                                        
             </script>
		@endsection