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
  
  <div class="card-header">Import Edit Page
  <span class="float-right">
                    <a class="btn btn-primary" href="{{ url('/course') }}">Back</a>
                </span>
  </div>
  <div class="card-body">
  
  {!! Form::model($course, ['route' => ['course.update', $course->id], 'method'=>'PATCH']) !!}
  <div class="form-group">
    <strong>Date:</strong>
    {!! Form::text('date', null, array('placeholder' => 'Date','class' => 'form-control')) !!}
</div>
<div class="form-group">
    <strong>CN:</strong>
    {!! Form::text('cn', null, array('placeholder' => 'CN','class' => 'form-control')) !!}
</div>
<div class="form-group">
    <strong>Container No:</strong>
    {!! Form::text('container_no', null, array('placeholder' => 'Container No','class' => 'form-control')) !!}
</div>
<div class="form-group">
    <strong>ATA:</strong>
    {!! Form::text('ata', null, array('placeholder' => 'ATA','class' => 'form-control')) !!}
</div>
<div class="form-group">
    <strong>SKP:</strong>
    {!! Form::text('skp', null, array('placeholder' => 'SKP','class' => 'form-control')) !!}
</div>
<div class="form-group">
    <strong>Expired:</strong>
    {!! Form::text('expired', null, array('placeholder' => 'Expired','class' => 'form-control')) !!}
</div>
<div class="form-group">
    <strong>Size:</strong>
    {!! Form::text('size', null, array('placeholder' => 'Size','class' => 'form-control')) !!}
</div>
<div class="form-group">
    <strong>Destination:</strong>
    {!! Form::text('destination', null, array('placeholder' => 'Destination','class' => 'form-control')) !!}
</div>
<div class="form-group">
    <strong>Agent:</strong>
    {!! Form::text('agent', null, array('placeholder' => 'Agent','class' => 'form-control')) !!}
</div>
<div class="form-group">
    <strong>Depot:</strong>
    {!! Form::text('depot', null, array('placeholder' => 'Depot','class' => 'form-control')) !!}
</div>
<div class="form-group">
    <strong>KB(Date):</strong>
    {!! Form::text('kb_date', null, array('placeholder' => 'KB(Date)','class' => 'form-control')) !!}
</div>
<div class="form-group">
    <strong>Send Date:</strong>
    {!! Form::text('send_date', null, array('placeholder' => 'Send Date','class' => 'form-control')) !!}
</div>
<div class="form-group">
    <strong>ECO Depot:</strong>
    {!! Form::text('eco', null, array('placeholder' => 'ECO Depot','class' => 'form-control')) !!}
</div>
<div class="form-group">
    <strong>Back Date:</strong>
    {!! Form::text('back_date', null, array('placeholder' => 'Back Date','class' => 'form-control')) !!}
</div>
<div class="form-group">
    <strong>Trailer:</strong>
    {!! Form::text('trailer', null, array('placeholder' => 'Trailer','class' => 'form-control')) !!}
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
