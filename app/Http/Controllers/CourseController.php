<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\CourseMaterial;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use PDF;
use Sortable;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CoursesExport;


class CourseController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
 function __construct()
    {
         $this->middleware('permission:import-list|import-create|import-edit|import-delete', ['only' => ['index','store']]);
         $this->middleware('permission:import-create', ['only' => ['create','store']]);
         $this->middleware('permission:import-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:import-delete', ['only' => ['destroy']]);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
        public function export()
        {
            return Excel::download(new CoursesExport, 'courses.xlsx');
        }
     

    public function index()
    {
        $course = Course:: sortable()-> paginate(5);
      return view ('course.index', compact ('course'));
    }

    public function campus()
    {
         $courseview = Course:: all() ;
      return view ('course.campus', compact ('courseview')); 
    }

    

    
    public function downloadPDF(){
        $data = Course:: all();
        view()->share('course', $data);
        $pdf = PDF::loadView('pdf_course', compact('data'));
       
        return $pdf->download('invoice.pdf');
  
      }

    public function singlePDF($id){

        $course = Course:: find($id);
        view()->share('course', $course);
        $pdf = PDF::loadView('pdf_single_course', compact('course'));
       
        return $pdf->download('invoice.pdf');
  
      }
    


    public function create()
    {
        return view('course.create');
    }
 
  
    public function store(Request $request)
    {
        $input = $request->all();
        Course::create($input);
        return redirect('course')->with('flash_message', 'Course Addedd!');  
    }
 
    
    public function show($id)
    {
        $course = Course::find($id);
        return view('course.show')->with('course', $course);
    }

    public function details($id)
    {
        $courseview = Course::find($id);
        return view('course.details')->with('courseview', $courseview);
    }
 
    
    public function edit($id)
    {
     
        $course = Course::find($id);
        $lesson = CourseMaterial::pluck('lesson', 'lesson')->all();
        
        return view('course.edit',compact ('course','lesson'))->with('course', $course);
    }
 
   
  
    public function update(Request $request,$id)
    {
         $input = $request->all();
        $course = Course::find($id);
       
       
        $course->update($input);
        
        return redirect('course')->with('flash_message', 'Courses Updated!');  
    }
 
  
    public function destroy($id)
    {
        Course::destroy($id);
        return redirect('course')->with('flash_message', 'Courses deleted!');  
    }

   
}
