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
  <div class="card-header">Export Page
  <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('exports.index') }}">Back</a>
                </span>
  </div>
  <div class="card-body">
      
      <form action="{{ url('exports') }}" method="post">
        {!! csrf_field() !!}
        <label for="date">Date</label><br>
    <input type="text" name="date" id="date" class="form-control"><br>

    <label for="cn">CN</label><br>
    <input type="text" name="cn" id="cn" class="form-control"><br>

    <label for="booking">Booking</label><br>
    <input type="text" name="booking" id="booking" class="form-control"><br>

    <label for="container">Container No</label><br>
    <input type="text" name="container" id="container" class="form-control"><br>

    <label for="seal">Seal</label><br>
    <input type="text" name="seal" id="seal" class="form-control"><br>

    <label for="size">Size</label><br>
    <input type="text" name="size" id="size" class="form-control"><br>

    <label for="destination">Destination</label><br>
    <input type="text" name="destination" id="destination" class="form-control"><br>

    <label for="scn">SCN</label><br>
    <input type="text" name="scn" id="scn" class="form-control"><br>

    <label for="cda">CDA</label><br>
    <input type="text" name="cda" id="cda" class="form-control"><br>

    <label for="vessel_name">Vessel Name</label><br>
    <input type="text" name="vessel_name" id="vessel_name" class="form-control"><br>

    <label for="req_date">Req Date</label><br>
    <input type="text" name="req_date" id="req_date" class="form-control"><br>

    <label for="gate_open">Gate Open</label><br>
    <input type="text" name="gate_open" id="gate_open" class="form-control"><br>

    <label for="clossing">Closing</label><br>
    <input type="text" name="clossing" id="clossing" class="form-control"><br>

    <label for="agent">Agent</label><br>
    <input type="text" name="agent" id="agent" class="form-control"><br>

    <label for="depot">Depot</label><br>
    <input type="text" name="depot" id="depot" class="form-control"><br>

    <label for="depot_date">Depot Date</label><br>
    <input type="text" name="depot_date" id="depot_date" class="form-control"><br>

    <label for="send_date">Send Date</label><br>
    <input type="text" name="send_date" id="send_date" class="form-control"><br>

    <label for="back_date">Back Date</label><br>
    <input type="text" name="back_date" id="back_date" class="form-control"><br>

    <label for="trailer">Trailer</label><br>
    <input type="text" name="trailer" id="trailer" class="form-control"><br>

    <div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" id="status" name="status">
        <option value="Pending" >Pending</option>
        <option value="On the Way" >On the Way</option>
        <option value="Delivered" >Delivered</option>
    </select>
</div>
        <input type="submit" value="Save" class="btn btn-success"></br>   </form>
  </div>
</div></div>
@stop