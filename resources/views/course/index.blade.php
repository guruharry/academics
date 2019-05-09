@extends('layouts.apps')
@section('content')
<div class="row">
<div class="col-sm-2 well"  >

  <div class="well">  

 <ul class="nav tabs-vertical" class="nav nav-pills nav-stacked" class="pull-left">
  <h5 class="text-center" style="margin-top: -10px;"><strong>  Dashboard </strong></h5>
        <hr style="margin-bottom: -2px;">

        <li ><a href="students">Students</a></li>
        <li><a href="course">Courses</a></li>
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
    <h4 class="pull-left" style="margin-top: -10px;"><strong>  Courses </strong></h4>
</div>
<hr style="margin-top:0px;">
  <div class="table table-responsive">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

     <span class="pull-left"><a href="#" class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>Create Course
          </a></span>



    <table class="table table-bordered  table-striped table-responsive table-condensed" id="table">
      <tr>
        <th width="150px">No</th>
        <th>Name</th>
        <th>Code</th>
        <th>School</th>
        <th>Department</th>
        <th>Action</th>
      </tr>
      {{ csrf_field() }}
      <?php  $no=0; ?>
      @foreach($course as $value)
          <tr class="course{{$value->id}}">   
      
          <td><b>{{++$no}}.</b></td>
          <td>{{ $value->name }}</td>
          <td>{{ $value->code }}</td>
          <td>{{ $value->school }}</td>
          <td>{{ $value->department }}</td>
          <td>
            <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-name="{{$value->name}}" data-code="{{$value->code}}" data-school="{{$value->school}}" data-department="{{$value->department}}">
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$value->id}}" data-name="{{$value->name}}" data-code="{{$value->code}}" data-school="{{$value->school}}" data-department="{{$value->department}}">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" data-name="{{$value->name}}" data-code="{{$value->code}}" data-school="{{$value->school}}" data-department="{{$value->department}}">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
 <ul class="pagination">
            {{ $course->links() }}
        </ul>
       
  </div>
  </div>
</div>
  

</div>
</div>


{{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group row add">
            <label class="control-label col-sm-2" for="title">Name :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name"
              placeholder="Course Name" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="body">Code :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="code" name="code"
              placeholder="Course Code" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
          <div class="form-group row add">
            <label class="control-label col-sm-2" for="title">School :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="school" name="school"
              placeholder="School" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
          <div class="form-group row add">
            <label class="control-label col-sm-2" for="title">Department :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="department" name="department"
              placeholder="Department" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
        </form>


      </div>
          <div class="modal-footer">
            <button class="btn btn-warning" type="submit" id="add">
              <span class="glyphicon glyphicon-plus"></span>Save Course
            </button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remove"></span>Close
            </button>
          </div>
    </div>
  </div>
</div>


{{-- Modal Form Show POST --}}
<div id="show" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
                  </div>
                    <div class="modal-body">


                    <div class="form-group">
                      <label for="">Id :</label>
                      <b id="i"/>
                    </div>

                    <div class="form-group">
                      <label for="">Name :</label>
                      <b id="n"/>
                    </div>

                    <div class="form-group">
                      <label for="">Code:</label>
                      <b id="c"/>
                    </div>

                    <div class="form-group">
                      <label for="">School :</label>
                      <b id="s"/>
                    </div>

                    <div class="form-group">
                      <label for="">Department :</label>
                      <b id="d"/>
  </div>
  </div>
</div>
 </div>
</div>

{{-- Modal Form Edit and Delete Post --}}
<div id="myModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
       
               <form class="form-horizontal" role="modal">

          <div class="form-group">
            <label class="control-label col-sm-2"for="id">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fid" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="name">Name</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="na">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="code">Code</label>
            <div class="col-sm-10">
            <textarea type="name" class="form-control" id="co"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="school">School</label>
            <div class="col-sm-10">
            <textarea type="name" class="form-control" id="sc"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="department">Department</label>
            <div class="col-sm-10">
            <textarea type="name" class="form-control" id="de"></textarea>
            </div>
          </div>
        </form>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
          Are You sure want to delete <span class="name"></span>?
          <span class="hidden id"></span>
        </div>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>

        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>close
        </button>

      </div>
    </div>
  </div>
</div>
@endsection