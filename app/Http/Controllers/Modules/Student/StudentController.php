<?php

namespace App\Http\Controllers\Modules\Student;
use App\Http\Controllers\Controller;
use App\Models\Modules\Student;
use App\Models\Modules\Teacher;
use Crypt;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $studentData = Student::get();
        return view('Modules.students.index',compact('studentData'));
    }
    public function create()
    {
        $teacherData = Teacher::get();
        return view('Modules.students.create',compact('teacherData'));
    }
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'name'      => 'required|min:4|unique:students,name',
            'age'       => 'required|numeric',
            'gender'    => 'required',
            'teacher'   => 'required'
        ]);
        
        if($validator->fails()){
            return back()->with(['toastr'=>true,'type'=>'error','message'=>$validator->messages()->first()]);
        }

        $student = new Student;
        $student->name      = $request->name;
        $student->age       = $request->age;
        $student->gender    = $request->gender;
        $student->teacher   = $request->teacher;

        if($student->save()){
            return redirect()->route('student.index')->with(['toastr'=>true,'type'=>'success','message'=>'Student Created Successfully']);
        }
    }
    public function edit(Request $request)
    {
        $encID       = $request->id;
        $id          = Crypt::decrypt($encID);
        $studentData = Student::find($id);
        $teacherData = Teacher::get();
        return view('Modules.students.edit',compact('studentData','encID','teacherData'));
    }
    public function update(Request $request)
    {
        $encID   = $request->encID;
        $id      = Crypt::decrypt($encID);

        $validator = \Validator::make($request->all(),[
            'name'      => 'required|min:4|unique:students,name,'.$id,
            'age'       => 'required|numeric',
            'gender'    => 'required',
            'teacher'   => 'required'
        ]);
        
        if($validator->fails()){
            return back()->with(['toastr'=>true,'type'=>'error','message'=>$validator->messages()->first()]);
        }

        $student = Student::find($id);
        $student->name      = $request->name;
        $student->age       = $request->age;
        $student->gender    = $request->gender;
        $student->teacher   = $request->teacher;

        if($student->save()){
            return redirect()->route('student.index')->with(['toastr'=>true,'type'=>'success','message'=>'Student Updated Successfully']);
        }
    }
    public function delete(Request $request)
    {
        $encID   = $request->encID;
        $id      = Crypt::decrypt($encID);
        $student = Student::find($id);
        $student->delete();

        return response()->json([
            'status' =>true
        ]);
    }
}
