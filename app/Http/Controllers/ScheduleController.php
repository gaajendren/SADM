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

public function calendar($driverId)
{
    $driver = DriversTimetable::findOrFail($driverId);

    $schedules = Schedule::where('driver_id', $driver->id)->get();

    $events = [];
    foreach ($schedules as $schedule) {
        // Combine date and time into a single start property in ISO format
        $start = Carbon::parse("{$schedule->date} {$schedule->start_time}")->toIso8601String();

        // Combine date and time into a single end property in ISO format
        $end = Carbon::parse("{$schedule->date} {$schedule->end_time}")->toIso8601String();

        $events[] = [
            'id' => $schedule->id, // Include a unique event ID (required by DayPilot)
            'text' => "Driver {$schedule->driver_id}",
            'start' => $start,
            'end' => $end,
        ];
    }

    return view('schedules.calendar', compact('driver', 'events'));
}



    public function create($driverId)
{
    $driver = DriversTimetable::findOrFail($driverId);

    return view('schedules.create', compact('driver'));
}

public function store(Request $request, $driverId)
{
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
    // Set other schedule fields as needed
    $schedule->save();

    return redirect()->route('driver.index', $driver->id)
        ->with('success', 'Schedule added successfully.');
}

public function edit($driverId, $scheduleId)
{
    $driver = DriversTimetable::findOrFail($driverId);
    $schedule = Schedule::findOrFail($scheduleId);

    return view('schedules.edit', compact('driver', 'schedule'));
}

public function update(Request $request, $driverId, $scheduleId)
{
    $driver = DriversTimetable::findOrFail($driverId);
    $schedule = Schedule::findOrFail($scheduleId);

    $request->validate([
        'date' => 'required|date',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i',
        // Add validation for other schedule fields as needed
    ]);

    $schedule->date = $request->input('date', 'start_time' , 'end_time');
    // Update other schedule fields as needed
    $schedule->save();

    return redirect()->route('schedules.index', $driver->id)
        ->with('success', 'Schedule updated successfully.');
}

public function destroy($driverId, $scheduleId)
{
    $driver = DriversTimetable::findOrFail($driverId);
    $schedule = Schedule::findOrFail($scheduleId);
    $schedule->delete();

    return redirect()->route('schedules.index', $driver->id)
        ->with('success', 'Schedule deleted successfully.');
}

}
