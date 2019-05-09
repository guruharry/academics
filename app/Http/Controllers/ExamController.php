<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('exams.index', ['exams' => Exam::paginate(10)]  );
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
           'name'=>'required',
           'examdate' => 'required',
           'category' => 'required' 
        ]);

        Exam::create($request->all());
    
        return Redirect::to('exams')
       ->with('success','Exam created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        //
         Exam::findorFail($request->id)->update(array_merge($request->except(['id'])));
        return redirect('/exams')->with('success', 'Exam details have been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         Exam::destroy($id);
        return redirect('/exams')->with('error', 'Exam has been deleted!');
    }
}
