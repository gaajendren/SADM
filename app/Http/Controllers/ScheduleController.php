<?php

namespace App\Http\Controllers;
use App\Models\Schedule;
use App\Models\DriversTimetable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class ScheduleController extends Controller
{


    public function index($driverId)
{
    $driver = DriversTimetable::findOrFail($driverId);

    return view('schedules.index', compact('driver'));
}




    public function create($driverId)
{
    $driver = DriversTimetable::findOrFail($driverId);

    return view('schedules.create', compact('driver'));
}

public function store(Request $request )
{
    $driverId = $request->input('driverid');
    $driver = DriversTimetable::findOrFail($driverId);

    $request->validate([
        'date' => 'required|date',
        'start_time' => [
            'required',
            'date_format:H:i',
            function ($attribute, $value, $fail) use ($driverId, $request) {
                $query = Schedule::where('driver_id', $driverId)
                    ->where('date', $request->input('date'))
                    ->where('start_time', $request->input('start_time'))
                    ->where('end_time', '>', $request->input('start_time'));

                if ($query->exists()) {
                    $fail('The selected start time is not available.');
                }
            }
        ],
        'end_time' => [
            'required',
            'date_format:H:i',
            'after:start_time',
            function ($attribute, $value, $fail) use ($driverId, $request) {
                $query = Schedule::where('driver_id', $driverId)
                    ->where('date', $request->input('date'))
                    ->where('end_time', $request->input('end_time'))
                    ->where('start_time', '<', $request->input('end_time'));

                if ($query->exists()) {
                    $fail('The selected end time is not available.');
                }
            }
        ],
    ]);
  
    $schedule = new Schedule();
    $schedule->driver_id = $driver->id;
    $schedule->date = $request->input('date');
    $schedule->start_time = $request->input('start_time');
    $schedule->end_time = $request->input('end_time');
    $schedule->type = $request->input('type');
    $schedule->type_id = $request->input('type_id');
  
    // Set other schedule fields as needed
    $schedule->save();

    return redirect()->route('driver.index', $driver->id)
        ->with('success', 'Schedule added successfully.');
}

public function edit($driverId, $scheduleId)
{
    $driver = DriversTimetable::findOrFail($driverId);
    $schedule = Schedule::findOrFail($scheduleId);

    return view('schedules.edit', compact('schedule'))->with('schedule', $schedule);
}



public function update(Request $request, $scheduleId)
{ 
    $input = $request->all();
    $schedule = Schedule::findOrFail($scheduleId);
    
   
    $schedule->update($input);
   

    return redirect('driver')
        ->with('success', 'Schedule updated successfully.');
}



public function destroy( $scheduleId)
{
    
    $schedule = Schedule::findOrFail($scheduleId);
    $driverId =  $schedule->driver_id;
    $schedule->delete();

    return redirect()->route('driver.index', $driverId)
        ->with('success', 'Schedule deleted successfully.');
       
}

}
