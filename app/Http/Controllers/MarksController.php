<?php

namespace App\Http\Controllers;
use App\Unit;
use App\Exam;
use App\Student;
use App\Course;
use App\Semester;
use App\Marks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $exams = Exam::all(['id', 'name']);
        $courses = Course::all(['id', 'name', 'code']);
        $students = Student::all(['id', 'name']);
        $semester = Semester::all(['id', 'name']);
        $units = Unit::all(['id', 'name', 'code']);
        return view('marks.index', ['marks' => Marks::paginate(10)], ['courses' => $courses, 'semester' => $semester,'units' => $units,'students' => $students,'exams' => $exams ]  );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
          'course' => 'required',
          'semester' => 'required',
          'student' => 'required',
          'exam' => 'required',
          'unit' => 'required',
          'marks' => 'required'
        ]);
      

        Marks::create($request->all());
    
        return Redirect::to('marks')
       ->with('success','Exam created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function show(Marks $marks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function edit(Marks $marks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marks $marks)
    {
        //
         Marks::findorFail($request->id)->update(array_merge($request->except(['id'])));

        return redirect('/marks')->with('success', 'Marks details have been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Marks::destroy($id);
        return redirect('/marks')->with('error', 'Marks has been deleted!');
    }
}
