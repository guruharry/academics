
@extends('layouts.apps')

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
     <form   id="demo-form" method="post" action="{{ url('storeunit') }}">
        {{ csrf_field() }}
  
     <div class="form-group">
        <label  for="form-username">Unit Name <span class="text-danger">*</span></label>
        <input type="text" name="name" placeholder="Unit name..." class=" form-control"  required parsley-type="text">
    </div>
     <div class="form-group">
        <label  for="form-username">Unit Code <span class="text-danger">*</span></label>
        <input type="text" name="code" placeholder="Unit Code..." class=" form-control"  required parsley-type="text">
    </div>
    <div class="form-group">
        <label  for="form-username">Course <span class="text-danger">*</span></label>
        <select class="form-control" name="course"  required >
              <option value="-1">Please select your course</option>
                 @foreach ($courses as $value)
               <option value="{{$value->name}}">{{$value->name}}</option>
             @endforeach
        </select>
    </div>
   
     <div class="form-group">
    <input type="submit" class="btn btn-success" value="Submit">
</div>
</form>
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
                <th>Unit Name</th>
                <th>Unit Code</th>
                <th>Course</th>
                <th>Semester</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @php $i=0; @endphp
            @forelse($units as $unit)
            @php $i++; @endphp
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $unit->name }}</td>
                <td>{{ $unit->code}}</td>
                <td>{{ $unit->course}}</td>
                <td>{{ $unit->semester}}</td>
                <td>
    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#panel-modal-{{ $unit->id }}"><i class="fa fa-trash"></i>Delete</a>
    <a href="" class="btn btn-warning" data-toggle="modal" data-target="#update-modal-{{ $unit->id }}"><i class="fa fa-edit"></i>Edit</a>
                </td>
 <!-- ====================Delete Modal===========================  -->
<div id="panel-modal-{{ $unit->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
                    <h5>Are you sure you want to delete this unit?</h5>
                </div>
                  <div class="modal-footer">
        <a href="{{ url('/deleteunit/'.$unit->id) }}" class="btn btn-success pull-left">Okay</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
            </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ====================End Delete Modal===========================  -->
<!-- Update Modal -->
<div class="modal fade" id="update-modal-{{ $unit->id }}" style="overflow: hidden;" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Unit</h4>
      </div>
      <div class="modal-body">
     <form  role="form" id="update-form-{{$unit->id}}" method="post" action="{{ url('/updateunit') }}" enctype='multipart/form-data'>
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
          <input type="hidden" name="id" value="{{ $unit->id }}">
  <div class="form-group">
        <label  for="form-username">Unit Name </label>
        <input type="text" name="name" value="{{ $unit->name }}" class=" form-control">
    </div>
     <div class="form-group">
        <label  for="form-username">Unit Code</label>
        <input type="text" name="code" value="{{ $unit->code }}" class=" form-control">
    </div>
   
    <div class="form-group">
        <label  for="form-username">Course</label>
        <select name="course" class="form-control " required>
          @php 
          $courses=\DB::table('courses')->get();
           @endphp
            @forelse($courses as $course)
            <option {{$course->name == $unit->course ? 'selected' : ''}} value="{{$course->name}}">{{$course->name}}</option>
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
          <option {{$semester->name == $unit->semester ? 'selected' : ''}} value="{{$semester->name}}">{{$semester->name}}
            </option>
            @empty
            <option value="">No data</option>
            @endforelse
        </select>        
    </div>   
</form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success pull-left" onclick="$('#update-form-{{$unit->id}}').submit()">Update</button>
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
 <ul class="pagination">
            {{ $units->links() }}
        </ul>


</div>
</div>
</div>
</div>

@stop