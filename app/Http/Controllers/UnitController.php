<?php

namespace App\Http\Controllers;

use App\Unit;
use App\Course;
use App\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::all(['id', 'name', 'code']);
        $semester = Semester::all(['id', 'name']);
        
       

        return view('units.index', ['units' => Unit::paginate(10)], ['courses' => $courses, 'semester' => $semester ] );
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
           'code' => 'required',
           'course' => 'required',
           'semester' => 'required'
           
        ]);

        Unit::create($request->all());
    
        return Redirect::to('units')
       ->with('success','Unit created successfully.');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
        $unit=Unit::findorFail($request->id);
        return view('units.index',  ['unit' => $unit ] );

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request)
    {
        //
       

      Unit::findorFail($request->id)->update(array_merge($request->except(['id'])));


       
     

        return redirect('/units')->with('success', 'Unit details have been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        unit::destroy($id);
        return redirect('/units')->with('error', 'Unit has been deleted!');
    }
}
