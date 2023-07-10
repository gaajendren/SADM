@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
<script src="https://kit.fontawesome.com/bc8e231302.js" crossorigin="anonymous"></script>
<style>
.course-item {
    margin-bottom: 20px;
}

.status-buttons {
    display: flex;
    justify-content: center;
}

.status-buttons button {
    margin-right: 10px;
}

</style>
<!-- Main Sidebar Container -->
@include('layouts.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: 100px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Import</h1>
        </div><!-- /.col -->
        <div class="col-sm-10">
          <ol class="breadcrumb float-sm-right">

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
    <div class="container" style="margin: left 60px;">
        
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Import</div>
                    <div class="card-body">
                        <a href="{{ url('/course/create') }}" class="btn btn-success btn-sm" title="Add New Course">
                       
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <a class="btn btn-success btn-sm" style="background-color: blue" href="{{ URL::to('/course/pdf') }}">Export to PDF</a>
                        <a class="btn btn-success btn-sm" style="background-color: blue" href="{{ URL::to('/course/export') }}">Export to Excel</a>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table id="ListCourse" class="table">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th> CN</th>
                                    <th>Container No</th>
                                    <th> ATA</th>
                                    <th>SKP</th>
                                    <th>Expired</th>
                                    <th>Size</th>
                                    <th>Destination</th>
                                    <th>Agent</th>
                                    <th>Depot</th>
                                    <th>KB(Date)</th>
                                    <th>Send Date</th>
                                    <th>ECO Depot</th>
                                    <th>Back Date</th>
                                    <th>Trailer</th>
                                    <th>Status</th>

                    
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                @foreach($course as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->cn }}</td>
                                        <td>{{ $item->container_no }}</td>
                                        <td>{{ $item->ata }}</td>
                                        <td>{{ $item->skp }}</td>
                                        <td>{{$item->expired}}</td>   
                                        <td>{{$item->size}}</td>   
                                        <td>{{$item->destination}}</td>   
                                        <td>{{$item->agent}}</td>   
                                        <td>{{$item->depot}}</td>   
                                        <td>{{$item->kb_date}}</td>  
                                         <td>{{$item->send_date}}</td> 
                                         <td>{{$item->eco}}</td> 
                                          <td>{{$item->back_date}}</td>  
                                         <td>{{$item->trailer}}</td>
                                         <td> <div class="action-buttons d-flex">
            <button class="btn btn-sm {{ $item->status === 'Pending' ? 'btn-warning' : ($item->status === 'On the Way' ? 'btn-info' : 'btn-success') }}">{{ $item->status }}</button>
        </div></td>
                                          
                                               
                                        <td>
                                        <div class="action-buttons d-flex">

                 <a href="{{ url('/course/' . $item->id . '/pdf') }}" title="Export pdf" class="mr-2">
                    <button class="btn btn-warning btn-sm">
                        <i class="fa fa-eye" aria-hidden="true"></i> Pdf
                    </button>
                </a>
                <a href="{{ url('/course/' . $item->id) }}" title="View Course" class="mr-2">
                    <button class="btn btn-info btn-sm">
                        <i class="fa fa-eye" aria-hidden="true"></i> View
                    </button>
                </a>
                <a href="{{ url('/course/' . $item->id . '/edit') }}" title="Edit Course" class="mr-2">
                    <button class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                    </button>
                </a>
                <form method="POST" action="{{ url('/course' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Course" onclick="return confirm(&quot;Confirm delete?&quot;)">
                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                    </button>
                </form>
            </div>
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


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<script>

$(document).ready(function() {
    $('#ListCourse').DataTable();
} );
</script>


@endsection