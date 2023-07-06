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
          <h1 class="m-0">Export</h1>
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
  
  <div class="card-header">Export Edit Page
  <span class="float-right">
                    <a class="btn btn-primary" href="{{ url('/exports') }}">Back</a>
                </span>
  </div>
  <div class="card-body">
  
  {!! Form::model($course, ['route' => ['exports.update', $course->id], 'method' => 'PATCH']) !!}
<div class="form-group">
    <strong>Date:</strong>
    {!! Form::text('date', null, ['placeholder' => 'Date', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>CN:</strong>
    {!! Form::text('cn', null, ['placeholder' => 'CN', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>Booking:</strong>
    {!! Form::text('booking', null, ['placeholder' => 'Booking', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>Container:</strong>
    {!! Form::text('container', null, ['placeholder' => 'Container', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>Seal:</strong>
    {!! Form::text('seal', null, ['placeholder' => 'Seal', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>Size:</strong>
    {!! Form::text('size', null, ['placeholder' => 'Size', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>Destination:</strong>
    {!! Form::text('destination', null, ['placeholder' => 'Destination', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>SCN:</strong>
    {!! Form::text('scn', null, ['placeholder' => 'SCN', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>CDA:</strong>
    {!! Form::text('cda', null, ['placeholder' => 'CDA', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>Vessel Name:</strong>
    {!! Form::text('vessel_name', null, ['placeholder' => 'Vessel Name', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>Req Date:</strong>
    {!! Form::text('req_date', null, ['placeholder' => 'Req Date', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>Gate Open:</strong>
    {!! Form::text('gate_open', null, ['placeholder' => 'Gate Open', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>Closing:</strong>
    {!! Form::text('clossing', null, ['placeholder' => 'Clossing', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>Agent:</strong>
    {!! Form::text('agent', null, ['placeholder' => 'Agent', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>Depot:</strong>
    {!! Form::text('depot', null, ['placeholder' => 'Depot', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>Depot Date:</strong>
    {!! Form::text('depot_date', null, ['placeholder' => 'Depot Date', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>Send Date:</strong>
    {!! Form::text('send_date', null, ['placeholder' => 'Send Date', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>Back Date:</strong>
    {!! Form::text('back_date', null, ['placeholder' => 'Back Date', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <strong>Trailer:</strong>
    {!! Form::text('trailer', null, ['placeholder' => 'Trailer', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" id="status" name="status">
        <option value="Pending" {{ $course->status === 'Pending' ? 'selected' : '' }}>Pending</option>
        <option value="On the Way" {{ $course->status === 'On the Way' ? 'selected' : '' }}>On the Way</option>
        <option value="Delivered" {{ $course->status === 'Delivered' ? 'selected' : '' }}>Delivered</option>
    </select>
</div>
       
<button type="submit" class="btn btn-primary">Submit</button>

{!! Form::close() !!}
  </div>
</div></div>
@stop
