<?php

namespace App\Http\Controllers\Modules\Student;
use App\Http\Controllers\Controller;
use App\Models\Modules\Student;
use App\Models\Modules\Mark;
use Crypt;

use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function index()
    {
        $markData = Mark::get();
        return view('Modules.Mark.index',compact('markData'));
    }
    public function create()
    {
        $studentData = Student::get();
        return view('Modules.Mark.create',compact('studentData'));
    }
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'name'      => 'required',
            'term'      => 'required',
            'maths'     => 'required|numeric',
            'science'   => 'required|numeric',
            'history'   => 'required|numeric',
        ]);
        
        if($validator->fails()){
            return back()->with(['toastr'=>true,'type'=>'error','message'=>$validator->messages()->first()]);
        }   

        $maths    = $request->maths;
        $science  = $request->science;
        $history  = $request->history;

        $mark   = new Mark;
        $mark->name         = $request->name;
        $mark->term         = $request->term;
        $mark->maths        = $maths;
        $mark->science      = $science;
        $mark->history      = $history;
        $mark->total        = $maths+$science+$history;
        $mark->created_at   = now();

        if($mark->save()){
            return redirect()->route('mark.index')->with(['toastr'=>true,'type'=>'success','message'=>'Mark Entered Successfully']);
        }
    }
    public function edit(Request $request)
    {
        $encID       = $request->id;
        $id          = Crypt::decrypt($encID);
        $markData    = Mark::find($id);
        $studentData = Student::get();
        return view('Modules.Mark.edit',compact('studentData','markData','encID'));
    }
    public function update(Request $request)
    {
        $encID   = $request->encID;
        $id      = Crypt::decrypt($encID);

        $validator = \Validator::make($request->all(),[
            'name'      => 'required',
            'term'      => 'required',
            'maths'     => 'required|numeric',
            'science'   => 'required|numeric',
            'history'   => 'required|numeric',
        ]);
        
        if($validator->fails()){
            return back()->with(['toastr'=>true,'type'=>'error','message'=>$validator->messages()->first()]);
        }   

        $maths    = $request->maths;
        $science  = $request->science;
        $history  = $request->history;
        
        $mark = Mark::find($id);
        $mark->name         = $request->name;
        $mark->term         = $request->term;
        $mark->maths        = $maths;
        $mark->science      = $science;
        $mark->history      = $history;
        $mark->total        = $maths+$science+$history;
        $mark->updated_at   = now();

        if($mark->save()){
            return redirect()->route('mark.index')->with(['toastr'=>true,'type'=>'success','message'=>'Mark Updated Successfully']);
        }
    }
    public function delete(Request $request)
    {
        $encID = $request->encID;
        $id    = Crypt::decrypt($encID);
        $mark  = Mark::find($id);
        $mark->delete();

        return response()->json([
            'status' =>true
        ]);
    }
}
