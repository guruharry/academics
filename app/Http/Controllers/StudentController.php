<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;
use Validator;
use IlluminateSupportFacadesValidator;
use PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         $request->session()->put('search', $request
              ->has('search') ? $request->get('search') : ($request->session()
              ->has('search') ? $request->session()->get('search') : ''));

              $request->session()->put('field', $request
                      ->has('field') ? $request->get('field') : ($request->session()
                      ->has('field') ? $request->session()->get('field') : 'reg_no'));

                      $request->session()->put('sort', $request
                              ->has('sort') ? $request->get('sort') : ($request->session()
                              ->has('sort') ? $request->session()->get('sort') : 'asc'));

            $students = new Student();
            $students = $students->where('reg_no', 'like', '%' . $request->session()->get('search') . '%')
                ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
                ->paginate(10);
            if ($request->ajax()) {
              return view('students.index', compact('students'));
            } else {
              return view('students.ajax', compact('students'));
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

         $courses = Course::all(['id', 'name']);
    
     

        if ($request->isMethod('get'))
          return view('students.form', ['student' => Student::all()], compact('courses'));
     



        $rules = [
          'name' => 'required',
          'reg_no' => 'required',
          'course' => 'required',
          'nationality' => 'required',
          'dob' => 'required',
          'gender' => 'required',
          'county' => 'required',
          'image' => 'required',
          'email' => 'required',
          'address' => 'required',
          'phone_no' => 'required',
          'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        return response()->json([
          'fail' =>true,
          'errors' => $validator->errors()
        ]);

        $student = new Student();
         
        $student->name = $request->name;
        $student->reg_no = $request->reg_no;
        $student->course = $request->course;
        $student->nationality = $request->nationality;
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        $student->county = $request->county;
      
        $student->email = $request->email;
        $student->phone_no = $request->phone_no;
        $student->address = $request->address;

        if($request->hasfile('image'))
         {

            
                $file = $request->file('image');
                $extension = $file->getClientOriginalName();
                $filename = time() . '.' .$extension;
                $file->move(public_path('images'), $filename);
                $student->image = $filename;
         }else{

          return $request;
          $student->image = '';
         }
     
        $student->save();

        return response()->json([
          'fail' => false,
          'redirect_url' => url('students')
        ]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        if($request->isMethod('get')) {
          return view('students.detail',['student' => Student::find($id)]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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


      $courses = Course::all(['id', 'name']);

      if ($request->isMethod('get'))

       
      return view('students.form',['student' => Student::find($id)], compact('courses','student'));

      $rules = [
        'name' => 'required',
        'reg_no' => 'required',
        'course' => 'required',
        'nationality' => 'required',
        'dob' => 'required',
        'gender' => 'required',
        'county' => 'required',
        'email' => 'required',
        'address' => 'required',
        'phone_no' => 'required',
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
      return response()->json([
        'fail' =>true,
        'errors' => $validator->errors()
      ]);

        $student = Student::find($id);
        $student->name = $request->name;
        $student->reg_no = $request->reg_no;
        $student->course = $request->course;
        $student->nationality = $request->nationality;
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        $student->county = $request->county;
        $student->email = $request->email;
        $student->phone_no = $request->phone_no;
        $student->address = $request->address;


        if($request->hasfile('image'))
         {

            
                $file = $request->file('image');
                $extension = $file->getClientOriginalName();
                $filename = time() . '.' .$extension;
                $file->move(public_path('images'), $filename);
                $student->image = $filename;
         }
        $student->save();

      return response()->json([
        'fail' => false,
        'redirect_url' => url('students')
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function destroy($id)
    {
        Student::destroy($id);
        return redirect('students');
    }
     public function print(Request $request, $id)
    {
        //
        if($request->isMethod('get')) {
          $student = Student::find($id);

      $pdf = PDF::loadView('students.detail', ['student' => Student::find($id)]);
      return $pdf->download('students.pdf');
          
        }
   
        

    }
     public function preview(Request $request, $id)
    {
        //
       if($request->isMethod('get')) {
       $students = Student::all();
        return view('students.index')->with('students', $students);;
   
        }

    }


}
