<?php

namespace App\Http\Controllers;
use App\Models\export;
use App\Models\CourseMaterial;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use PDF;
use Sortable;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Exports;


class ExportController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
 
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
        public function export()
        {
            return Excel::download(new Exports, 'courses.xlsx');
        }
     

    public function index()
    {
        $course = export:: sortable()-> paginate(5);
      return view ('exports.index', compact ('course'));
    }

    public function campus()
    {
         $courseview = export:: all() ;
      return view ('exports.campus', compact ('courseview')); 
    }

    

    
    public function downloadPDF(){
        $data = export:: all();
        view()->share('course', $data);
        $pdf = PDF::loadView('pdf_export', compact('data'));
       
        return $pdf->download('invoice.pdf');
  
      }

       
    public function singlePDF($id){

        $item = export:: find($id);
        view()->share('course', $item);
        $pdf = PDF::loadView('pdf_single_export', compact('item'));
       
        return $pdf->download('invoice.pdf');
  
  
      }
    
    
    public function create()
    {
        return view('exports.create');
    }
 
  
    public function store(Request $request)
    {
        $input = $request->all();
        export::create($input);
        return redirect('exports')->with('flash_message', 'Course Addedd!');  
    }
 
    
    public function show($id)
    {
        $courseview = export::find($id);
        return view('exports.show')->with('courseview', $courseview);
    }

    public function details($id)
    {
        $courseview = export::find($id);
        return view('exports.details')->with('courseview', $courseview);
    }
 
    
    public function edit($id)
    {
     
        $course = export::find($id);
        $lesson = CourseMaterial::pluck('lesson', 'lesson')->all();
        
        return view('exports.edit',compact ('course','lesson'))->with('course', $course);
    }
 
   
  
    public function update(Request $request,$id)
    {
         $input = $request->all();
        $course = export::find($id);
       
       
        $course->update($input);
        
        return redirect('exports')->with('flash_message', 'Courses Updated!');  
    }
 
  
    public function destroy($id)
    {
        export::destroy($id);
        return redirect('exports')->with('flash_message', 'Courses deleted!');  
    }

   
}
