@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Travelers</div>

                <div class="card-body">
                     <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                                <tr>
                                  <th scope="col">SL</th>
                                  <th scope="col">Imaeg</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Address</th>
                                  <th scope="col">contact</th>
                                  <th scope="col">Status</th>
                                  
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php $i=1; @endphp
                                @foreach($alltravelers as $alltraveler)
                                <tr>
                                  <td>{{$i++}}</td>
                                  <td> <img src="{{asset('public/travelers/'.$alltraveler->image)}}" class="rounded" alt="Cinque Terre" width="50px" height="50px"> 
                                    <td>{{$alltraveler->name}}</td>
                                  <td>{{$alltraveler->email}}</td>
                                  <td>{{$alltraveler->address}}</td>
                                  <td>{{$alltraveler->phone}}</td>
                            
                                  <td>
                                    @if($alltraveler->status=='active')
                                  <div class="badge badge-success">active</div>
                                     @else
                                  <div class="badge badge-danger">pending </div>

                                    @endif

                                  </td>
                                  <td>
                                 
                                     <a href="{{url('/admin/traveler/accept/'.$alltraveler->id)}}" onclick="return confirm('Are You sure To Accept??')" class="btn btn-<?php if($alltraveler->status=='active'){echo "success";}else{echo "danger";}?> btn-xs"><i class="fa fa-check" aria-hidden="true"></i></a>
                                   
                                    <a href="{{url('/admin/traveler/view/'.$alltraveler->id)}}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('/admin/traveler/delete/'.$alltraveler->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('Are You sure To Accept??')"><i class="fa fa-trash"></i></a>
                                    
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection
