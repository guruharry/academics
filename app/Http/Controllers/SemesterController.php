<?php

namespace App\Http\Controllers;

use App\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $semesters = Semester::paginate(10);

        return view('semester.index', compact('semesters'));
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('semester.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     public function store(Request $request)
    {
        $request->validate([
           'name'=>'required'
           
        ]);

        Semester::create($request->all());
    
        return Redirect::to('semester')
       ->with('success','Semester created successfully.');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
         return view('semester.show',compact('semester'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(Semester $semester)
    {
        //
     
        return view('semester.edit', compact('semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
   
     public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $semester = Semester::find($id);
        $semester->name =  $request->get('name');
       
        $semester->save();

        return redirect('/semester')->with('success', 'Semester updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
       $semester = Semester::find($id);
        $semester->delete();

    
      return redirect('/semester')->with('success', 'Semester deleted!');
  }
}
