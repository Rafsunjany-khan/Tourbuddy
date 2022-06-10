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
                                <li class="breadcrumb-item">Product</li>
                                <li class="breadcrumb-item active">List Product</li>
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
                                                    <th>SL</th>
                                                    <th>customer</th>
                                                    <th>Shipping</th>
                                                    <th>Total</th>
                                                    <th>Payment-type</th>
                                                    <th>Note</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                               @php
                                                 $i=1;
                                                 @endphp
                                        @foreach ($orderDelivered as $orderDelivered)
                                            <tr>
                                                <td>{{$i++}}</td>
                            <td>{{$orderDelivered->name}}-{{$orderDelivered->phone}}</td>
                            <td>{{$orderDelivered->address}}</td>                          
                            <td>{{$orderDelivered->orderTotal}}</td>
                            <td><span class="badge bg-inverse-success">{{$orderDelivered->payment_type}}</span></td>
                            <td>{{$orderDelivered->note}}</td>
                            <td><span class="badge bg-inverse-warning">{{$orderDelivered->orderStatus}}</span></td>
                            <td>
                               
                                <a href="{{url('/admin/orderDelivered/accept/'.$orderDelivered->id)}}" onclick="return confirm('Are you want to Sure!!!')"  class=" btn-primary btn-sm" style="background-color: #28a745;
                                    border: 1px solid #28a745;
                                    border-radius: 6px;">
                                  <i class="fa fa-check" aria-hidden="true"></i>       
                                </a>
                                <a href="{{url('/admin/orderDelivered/view/'.$orderDelivered->id)}}" class=" btn-success btn-sm" style="border-radius: 20%;background-color: #1b1917;border: 1px solid #443323;">
                                    <i class="fa fa-print" aria-hidden="true"></i>
                                            {{-- <i class="fa fa-eye"></i> --}}
                                </a>
                                <a href="{{url('/admin/orderDelivered/delete/'.$orderDelivered->id)}}" onclick="return confirm('Are you want to Sure!!!')" class=" btn-danger btn-sm">
                                   <i class="fa fa-trash"></i>          
                                </a>
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
                                             $('#delivered_order').addClass('active');
                                        })
                                    </script>
@endsection