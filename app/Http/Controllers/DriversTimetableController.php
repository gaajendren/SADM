<?php

namespace App\Http\Controllers;
use App\Models\DriversTimetable;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use PDF;
use Sortable;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CoursesExport;



class DriversTimetableController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:driver-list|driver-create|driver-edit|import-delete', ['only' => ['index','store']]);
        $this->middleware('permission:driver-create', ['only' => ['create','store']]);
        $this->middleware('permission:driver-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:driver-delete', ['only' => ['destroy']]);
    }


    public function export()
    {
        return Excel::download(new CoursesExport, 'courses.xlsx');
    }
 

public function index()
{
    $course = DriversTimetable:: sortable()-> paginate(5);
  return view ('driver.index', compact ('course'));
}

public function campus()
{
     $courseview = DriversTimetable:: all() ;
  return view ('driver.campus', compact ('courseview')); 
}




public function downloadPDF(){
    $data = DriversTimetable:: all();
    view()->share('course', $data);
    $pdf = PDF::loadView('pdf_course', compact('data'));
   
    return $pdf->download('invoice.pdf');

  }

public function create()
{
    return view('driver.create');
}


public function store(Request $request)
{
    $input = $request->all();
    DriversTimetable::create($input);
    return redirect('driver')->with('flash_message', 'Course Addedd!');  
}


public function show($id)
{
    $courseview = DriversTimetable::find($id);
    return view('driver.show')->with('courseview', $courseview);
}

public function details($id)
{
    $courseview = DriversTimetable::find($id);
    return view('driver.details')->with('courseview', $courseview);
}


public function edit($id)
{
 
    $course = DriversTimetable::find($id);
   
    
    return view('driver.edit',compact ('course'))->with('course', $course);
}



public function update(Request $request,$id)
{
     $input = $request->all();
    $course = DriversTimetable::find($id);
   
   
    $course->update($input);
    
    return redirect('driver')->with('flash_message', 'Courses Updated!');  
}


public function destroy($id)
{
    DriversTimetable::destroy($id);
    return redirect('driver')->with('flash_message', 'Courses deleted!');  
}


}
