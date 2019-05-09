<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;



class CourseController extends Controller
{
    //
   public function addItem(Request $request)
    {
        $rules = array(
      'name' => 'required',
      'code' => 'required',
      'school' => 'required',
      'department' => 'required',
                
                
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(

                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $course = new Course();
            $course->name = $request->name;
            $course->code = $request->code;
            $course->school = $request->school;
            $course->department = $request->department;
            $course->save();

            return response()->json($course)->with('success', 'course created!');
        }
    }

    public function readItem(Request $req)
    {
        $course = Course::paginate(10);
       
        return view('course.index',compact('course'));

  
    }
    public function editItem(Request $req)
    {
        $course = Course::find($req->id);
        $course->name = $req->name;
        $course->code = $req->code;
        $course->school = $req->school;
        $course->department = $req->department;
        $course->save();

        return response()->json($course,[
        'fail' => false,
        'redirect_url' => url('students')->with('success', 'Course updated!')]);
       
     


    }

    public function deleteItem(Request $req)
    {
        Course::find($req->id)->delete();

        return response()->json();
    }
}

