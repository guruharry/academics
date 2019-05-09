
@extends('marks.master')

@section('content')
<div class="row">
  <div class="col-sm-2 well">

  <div class="well">    
 
 <ul class="nav tabs-vertical" class="nav nav-pills nav-stacked">
  <h5 class="text-center" style="margin-top: -10px;"><strong>  Dashboard </strong></h5>
        <hr style="margin-bottom: -2px;">

        <li ><a href="students">Students</a></li>
        <li><a href="../course">Courses</a></li>
        <li><a href="../semester">Semester</a></li>
        <li><a href="units">Units</a></li>
        <li><a href="exams">Exams</a></li>
        <li><a href="marks">Marks</a></li>
        <li><a href="results">Results</a></li>

      </ul>
    
</div>
  
    </div>

<div class="col-sm-10 ">
<div class="card-box">

<div class="well">
  <div class=" row  padded-md">
    <h4 class="pull-left" style="margin-top: -10px;"><strong>  Units </strong></h4>
</div>
<hr style="margin-top:0px;">

<!-- Add Role Modal -->
<div class="modal fade" id="permission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Unit</h4>
      </div>
      <div class="modal-body">
         <div class="panel-body">

        <span id="success_result"></span>
     <form  id="repeater_form" method="post" action="{{ url('storemark') }}">
        {{ csrf_field() }}
     
     <div class="form-group">
        <label  for="form-username">Course <span class="text-danger">*</span></label>
        <select class="form-control" name="course"  required >
              <option value="">Please select your course</option>
                 @foreach ($courses as $value)
               <option value="{{$value->name}}">{{$value->name}}</option>
             @endforeach
        </select>
    </div>
    <div class="form-group">
        <label  for="form-username">Semester<span class="text-danger">*</span></label>
        <select class="form-control" name="semester"  required >
           @php 
          $semesters=\DB::table('semesters')->get();
           @endphp
              <option value="">Select Semester</option>
                 @foreach ($semesters as $semester)
               <option value="{{$semester->name}}">{{$semester->name}}</option>
             @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label  for="form-username">Student <span class="text-danger">*</span></label>
        <select class="form-control" name="student"  required >
              <option value="">Select Student</option>
                 @foreach ($students as $student)
               <option value="{{$student->name}}">{{$student->name}}</option>
             @endforeach
        </select>
    </div>
     <div class="form-group">
        <label  for="form-username">Exam <span class="text-danger">*</span></label>
        <select class="form-control" name="course"  required >
              <option value="">Select Exam</option>
                 @foreach ($exams as $exam)
               <option value="{{$exam->name}}">{{$exam->name}}</option>
             @endforeach
        </select>
    </div>
    <div class="form-group">
        <label  for="form-username">Unit <span class="text-danger">*</span></label>
        <select class="form-control" name="course"  required >
              <option value="">Select Unit</option>
                 @foreach ($units as $unit)
               <option value="{{$unit->name}}">{{$unit->name}}</option>
             @endforeach
        </select>
    </div>
     <div class="form-group">
        <label  for="form-username">Marks <span class="text-danger">*</span></label>
        <input type="text" name="marks" placeholder="marks..." class=" form-control"  required parsley-type="text">
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-success" value="Submit">
</div>
 
 
</form>
      </div>
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Add Role Modal -->
 <button class="btn btn-success" data-toggle="modal" data-target="#permission"><span class="glyphicon glyphicon-plus" aria-hidden="true" ></span> Create Unit</button>
   <h6></h6>

 <table id="datatable" class="table table-striped table-bordered  table-condensed table-colored table-primary">
            <thead>
            <tr>
                <th>#</th>
                <th>Course</th>
                <th>Semester</th>
                <th>Student</th>
                <th>Exam</th>
                <th>Unit</th>
                <th>Marks</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @php $i=0; @endphp
            @forelse($marks as $mark)
            @php $i++; @endphp
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $mark->course }}</td>
                <td>{{ $mark->semester}}</td>
                <td>{{ $mark->student}}</td>
                <td>{{ $mark->exam}}</td>
                <th>{{ $mark->unit}}</th>
                <th>{{ $mark->marks}}</th>
                <td>
    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#panel-modal-{{ $mark->id }}"><i class="fa fa-trash"></i>Delete</a>
    <a href="" class="btn btn-warning" data-toggle="modal" data-target="#update-modal-{{ $mark->id }}"><i class="fa fa-edit"></i>Edit</a>
                </td>
 <!-- ====================Delete Modal===========================  -->
<div id="panel-modal-{{ $mark->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
                    <h5>Are you sure you want to delete this mark?</h5>
                </div>
                  <div class="modal-footer">
        <a href="{{ url('/deletemark/'.$mark->id) }}" class="btn btn-success pull-left">Okay</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
            </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ====================End Delete Modal===========================  -->
<!-- Update Modal -->
<div class="modal fade" id="update-modal-{{ $mark->id }}" style="overflow: hidden;" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Unit</h4>
      </div>
      <div class="modal-body">
     <form  role="form" id="update-form-{{$mark->id}}" method="post" action="{{ url('/updatemark') }}" enctype='multipart/form-data'>
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
          <input type="hidden" name="id" value="{{ $mark->id }}">

   
    <div class="form-group">
        <label  for="form-username">Course</label>
        <select name="course" class="form-control " required>
          @php 
          $courses=\DB::table('courses')->get();
           @endphp
            @forelse($courses as $course)
            <option {{$course->name == $mark->course ? 'selected' : ''}} value="{{$course->name}}">{{$course->name}}</option>
            @empty
            <option value="">No data</option>
            @endforelse
        </select>        
    </div>
    <div class="form-group">
        <label  for="form-username">Semester</label>
        <select name="semester" class="form-control " required>
          @php 
          $semesters=\DB::table('semesters')->get();
           @endphp
            @forelse($semesters as $semester)
          <option {{$semester->name == $mark->semester ? 'selected' : ''}} value="{{$semester->name}}">{{$semester->name}}
            </option>
            @empty
            <option value="">No data</option>
            @endforelse
        </select>        
    </div> 
     <div class="form-group">
        <label  for="form-username">Student</label>
        <select name="student" class="form-control " required>
          @php 
          $semesters=\DB::table('students')->get();
           @endphp
            @forelse($students as $student)
          <option {{$student->name == $mark->student ? 'selected' : ''}} value="{{$student->name}}">{{$student->name}}
            </option>
            @empty
            <option value="">No data</option>
            @endforelse
        </select>        
    </div>
    <div class="form-group">
        <label  for="form-username">Exam</label>
        <select name="exam" class="form-control " required>
          @php 
          $semesters=\DB::table('exams')->get();
           @endphp
            @forelse($exams as $exam)
          <option {{$exam->name == $mark->exam ? 'selected' : ''}} value="{{$exam->name}}">{{$exam->name}}
            </option>
            @empty
            <option value="">No data</option>
            @endforelse
        </select>        
    </div> 
    <div class="form-group">
        <label  for="form-username">Unit</label>
        <select name="unit" class="form-control " required>
          @php 
          $semesters=\DB::table('units')->get();
           @endphp
            @forelse($units as $unit)
          <option {{$unit->name == $mark->unit ? 'selected' : ''}} value="{{$unit->name}}">{{$unit->name}}
            </option>
            @empty
            <option value="">No data</option>
            @endforelse
        </select>        
    </div>
    <div class="form-group">
        <label  for="form-username">Marks</label>
        <input type="text" name="marks" value="{{ $mark->marks }}" class=" form-control">
    </div>    
</form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success pull-left" onclick="$('#update-form-{{$mark->id}}').submit()">Update</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Update Modal -->
            </tr>
            @empty
         <p>No Data Found</p>
            @endforelse
            </tbody>
        </table>
 


</div>
</div>
</div>
</div>
 

@stop