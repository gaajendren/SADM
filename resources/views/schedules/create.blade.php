@extends('layouts.app')

@section('content')
    <h1>Add Schedule for {{ $driver->Name }}</h1>

    {!! Form::open(['route' => ['schedules.store', $driver->id], 'method' => 'POST']) !!}
    <div class="form-group">
        <strong>Date:</strong>
        {!! Form::date('date', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <strong>Start Time:</strong>
        {!! Form::time('start_time', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <strong>End Time:</strong>
        {!! Form::time('end_time', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Add other fields related to the schedule as needed -->
    {!! Form::submit('Add Schedule', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
