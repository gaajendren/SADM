@extends('layouts.app')

@section('content')
    <h1>Edit Schedule for {{ $driver->Name }}</h1>

    {!! Form::model($schedule, ['route' => ['schedules.update', $driver->id, $schedule->id], 'method' => 'PATCH']) !!}
    <div class="form-group">
        <strong>Date:</strong>
        {!! Form::date('date', $schedule->date, ['class' => 'form-control']) !!}
    </div>
    <!-- Add other fields related to the schedule as needed -->
    {!! Form::submit('Update Schedule', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
