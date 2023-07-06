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
  <div class="container" style= "margin: left 50;">
<div class="card">
  <div class="card-header">Import Page
  <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('course.index') }}">Back</a>
                </span>
  </div>
  <div class="card-body">
      
      <form action="{{ url('course') }}" method="post">
        {!! csrf_field() !!}
  <label>Date</label><br>
<input type="text" name="date" id="date" class="form-control"><br>

<label>CN</label><br>
<input type="text" name="cn" id="cn" class="form-control"><br>

<label>Container No</label><br>
<input type="text" name="container_no" id="container_no" class="form-control"><br>

<label>ATA</label><br>
<input type="text" name="ata" id="ata" class="form-control"><br>

<label>SKP</label><br>
<input type="text" name="skp" id="skp" class="form-control"><br>

<label>Expired</label><br>
<input type="text" name="expired" id="expired" class="form-control"><br>

<label>Size</label><br>
<input type="text" name="size" id="size" class="form-control"><br>

<label>Destination</label><br>
<input type="text" name="destination" id="destination" class="form-control"><br>

<label>Agent</label><br>
<input type="text" name="agent" id="agent" class="form-control"><br>

<label>Depot</label><br>
<input type="text" name="depot" id="depot" class="form-control"><br>

<label>KB(Date)</label><br>
<input type="text" name="kb_date" id="kb_date" class="form-control"><br>

<label>Send Date</label><br>
<input type="text" name="send_date" id="send_date" class="form-control"><br>

<label>ECO Depot</label><br>
<input type="text" name="eco" id="eco" class="form-control"><br>

<label>Back Date</label><br>
<input type="text" name="back_date" id="back_date" class="form-control"><br>

<label>Trailer</label><br>
<input type="text" name="trailer" id="trailer" class="form-control"><br>


<div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" id="status" name="status">
        <option value="Pending" >Pending</option>
        <option value="On the Way" >On the Way</option>
        <option value="Delivered" >Delivered</option>
    </select>
</div>

        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

   
  </div>
</div></div>
@stop