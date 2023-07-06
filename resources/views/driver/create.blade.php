@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<script src="https://kit.fontawesome.com/bc8e231302.js" crossorigin="anonymous"></script>


<!-- Main Sidebar Container -->
@include('layouts.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: 100px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Course</h1>
        </div><!-- /.col -->
        <div class="col-sm-10">
          <ol class="breadcrumb float-sm-right">

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="container" style= "margin: left 50;">
<div class="card">
  <div class="card-header">Course Page
  <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('driver.index') }}">Back</a>
                </span>
  </div>
  <div class="card-body">
      
       <form action="{{ url('driver') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text" name="Name" id="Name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="contact">Contact No:</label>
            <input type="text" name="contact" id="contact" class="form-control">
        </div>
        <div class="form-group">
            <label for="vechicle_no">Vehicle No:</label>
            <input type="text" name="vechicle_no" id="vechicle_no" class="form-control">
        </div>
    
        <input type="submit" value="Save" class="btn btn-success"></br>   </form>
  </div>
</div></div>
@stop