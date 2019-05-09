
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

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class=" row  padded-md">
    <h4 class="pull-left" style="margin-top: -10px;"><strong>  Semesters </strong></h4>
</div>
<hr style="margin-top:0px;">
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('semester.create') }}"> Create New Semester</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered  table-striped table-responsive table-condensed" id="table">
        <tr>
            <th>No</th>
            <th>Name</th>
            
            <th width="280px">Action</th>
        </tr>
         @php
            $i=0;
        @endphp
        @foreach ($semesters as $semester)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $semester->name }}</td>
            
            <td>
                <form action="{{ route('semester.destroy',$semester->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('semester.show',$semester->id) }}">Show</a>
    
                    <a class="btn btn-warning" href="{{ route('semester.edit',$semester->id) }}">Edit</a>
   
                   {{ csrf_field() }}
               {{ method_field('DELETE') }}
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
   <ul class="pagination">
            {{ $semesters->links() }}
        </ul>
    
  </div>
</div>
</div>
</div>
      
@endsection