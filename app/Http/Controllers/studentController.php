<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Department;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;


class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        //return $students;
        return view('admin/students/index',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $departments = Department::all();
        return view('admin/students/create',['departments'=>$departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {   
        $img = $request->file('image');
        $ext = $img->getClientOriginalExtension();
        $image_name="$request->name - $request->id.$ext";
        $img->move(public_path('images/students'),$image_name);
        Student::create([
            'id'=>$request->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'image'=>$image_name,
            'department_id'=>$request->department_id
        ]);
        return redirect()->back()->with('msg',"added Successfully..");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findorfail($id);
        return view('admin/students/show' ,['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findorfail($id);
        $departments =Department::all();
        
        return view('admin/students/edit',['student'=>$student,'departments'=>$departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if($id == $request->id){
            $validated = $request->validate([
                'id'=> 'required|integer',
                'name'=> 'required|max:50|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/',
                'email'=> 'required|email|max:255|unique:students,email,'.$student->id,
                'phone'=> 'required|digits:11|unique:students,phone,'.$student->id,
                'department_id'=> 'required|max:255|min:1'
            ]);
        }
        else{
            $validated = $request->validate([
                'id'=> 'required|unique:students,id,'.$student->id.'|integer',
                'name'=> 'required|max:50|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/',
                'email'=> 'required|unique:studentsunique:students,email,'.$student->id.'|max:255|email',
                'phone'=> 'required|digits:11|unique:students,phone,'.$student->id,
                'department_id'=> 'required|max:255|min:1'
            ]);
        }
        $student->update([
            'id'=>$request->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'department_id'=>$request->department_id
        ]);
        return redirect()->back()->with('msg',"Updated Successfully..");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=Student::findorfail($id);
        $student->delete();
        return redirect(route('students.index'))->with('danger','deleted Succssfully..');
    }
    public function restore($id)
    {
        $student=Student::withTrashed()->findorfail($id);
        $student->restore();
        return redirect(route('students.index'))->with('msg','Restored Succssfully..');
    }
    public function archive(){
        $students = Student::onlyTrashed()->get();
        return view('admin.students.archive',['students'=>$students]);
    }
    public function forceDestroy($id)
    {
        $student=Student::withTrashed()->findorfail($id);
        $student->forceDelete();
        return redirect(route('students.index'))->with('danger','deleted Succssfully..');
    }
}
