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
    <h4 class="pull-left" style="margin-top: -10px;"><strong>  Exams </strong></h4>
</div>
<hr style="margin-top:0px;">

<!-- Add Role Modal -->
<div class="modal fade" id="permission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Exam</h4>
      </div>
      <div class="modal-body">
     <form   id="demo-form" method="post" action="{{ url('storeexam') }}">
        {{ csrf_field() }}
  
    <div class="form-group">
        <label  for="form-username">Exam Name <span class="text-danger">*</span></label>
        <input type="text" name="name" placeholder="Exam name..." class=" form-control"  required parsley-type="text">
    </div>
    <div class="form-group">
        <div class="form-group">
          <label for="field_id_date_field" class="col-sm-4 control-label">Exam date</label>
          <input  type="text" name="examdate" value="" class="form-control datepicker" placeholder="Exam Date"/> 
        </div>                         
    </div>

    <div class="form-group">
        <label  for="form-username">Category <span class="text-danger">*</span></label>
        <select class="form-control" name="category"  required >
              <option value="-1">Select exam category</option>
                 
               <option value="Main Exam">Main Exam</option>
               <option value="CAT">CAT</option>
               <option value="Retake">Retake</option>
               <option value="Special Exam">Special Exam</option>   
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
                <th>Exam Name</th>
                <th>Exam Date</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @php $i=0; @endphp
            @forelse($exams as $exam)
            @php $i++; @endphp
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $exam->name }}</td>
                <td>{{ $exam->examdate}}</td>
                <td>{{ $exam->category}}</td>
                <td>
    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#panel-modal-{{ $exam->id }}"><i class="fa fa-trash"></i>Delete</a>
    <a href="" class="btn btn-warning" data-toggle="modal" data-target="#update-modal-{{ $exam->id }}"><i class="fa fa-edit"></i>Edit</a>
                </td>
 <!-- ====================Delete Modal===========================  -->
<div id="panel-modal-{{ $exam->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
                    <h5>Are you sure you want to delete this exam?</h5>
                </div>
                  <div class="modal-footer">
        <a href="{{ url('/deleteexam/'.$exam->id) }}" class="btn btn-success pull-left">Okay</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
            </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ====================End Delete Modal===========================  -->
<!-- Update Modal -->
<div class="modal fade" id="update-modal-{{ $exam->id }}" style="overflow: hidden;" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Exam</h4>
      </div>
      <div class="modal-body">
     <form  role="form" id="update-form-{{$exam->id}}" method="post" action="{{ url('/updateexam') }}" enctype='multipart/form-data'>
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
          <input type="hidden" name="id" value="{{ $exam->id }}">
  <div class="form-group">
        <label  for="form-username">Exam Name </label>
        <input type="text" name="name" value="{{ $exam->name }}" class=" form-control">
    </div>
   <div class="form-group">
       <label  for="form-username">Exam Date <span class="text-danger">*</span></label>
          <div class="input-group date">
              <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
              </div>
              <input type="text"  name="examdate"  class="form-control datepicker" value="{{ $exam->examdate }}" placeholder="Exam Date..." class="form-control " required>
          </div>
  </div>
     <div class="form-group">
        <label  for="form-username">Category <span class="text-danger">*</span></label>
        <select class="form-control" name="category"  required >
              <option value="{{ $exam->category }}">{{ $exam->category }}</option>
                 
               <option value="Main Exam">Main Exam</option>
               <option value="CAT">CAT</option>
               <option value="Retake">Retake</option>
               <option value="Special Exam">Special Exam</option>   
        </select>
    </div>
    
</form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success pull-left" onclick="$('#update-form-{{$exam->id}}').submit()">Update</button>
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
            {{ $exams->links() }}
        </ul>


</div>
</div>
</div>
</div>

@stop