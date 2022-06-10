@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Post</div>

                <div class="card-body">
                     <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                                <tr>
                                  <th scope="col">SL</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Start Date</th>
                                  <th scope="col">End Date</th>
                                  <th scope="col">amount</th>
                                  <th scope="col">contact</th>
                                  <th scope="col">Status</th>
                                     <th scope="col">Detail</th>
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
                                  <td>{!! $allpost->details !!}</td>
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
                                    <a href="{{url('/admin/post/delete/'.$allpost->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('Are You sure To Accept??')"><i class="fa fa-trash"></i></a>
                                    
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
