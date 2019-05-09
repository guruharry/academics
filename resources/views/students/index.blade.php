
 <div class="row">
<div class="container-fluid">


<div class="col-sm-2 well">
<div class="card-box" >
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
</div>

  <div class="col-sm-10 "> 
<div class="card-box">
 <div class="well">
     
<div class=" row  padded-md">
    <h4 class="pull-left" style="margin-top: -10px;"><strong>  Students </strong></h4>
</div>
<hr style="margin-top:0px;">

   
          <div class="col-sm-5">
            <span class="pull-left"><a href="javascript:ajaxLoad('{{url('students/create')}}')"  class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true" ></span> Add Student</a></span>
              <!--
            <span class="pull-right"> <a  title="Print all Students Records" href="javascript:ajaxLoad('{{url('students/preview')}}')" class="btn btn-primary" ><span class="glyphicon glyphicon-print" >  </span> Print</a></span>
             -->
            
          
        </div>

       <div class="col-sm-7">

          <div class="pull-right">
            <div class="input-group">
                <input class="form-control" id="search" width="5px" 
                       value="{{ request()->session()->get('search') }}"
                       onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('students')}}?search='+this.value)"
                       placeholder="Search Reg_No" name="search"
                       type="text" id="search"/>
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-primary"
                            onclick="ajaxLoad('{{url('students')}}?search='+$('#search').val())">
                            <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

          </div>
        
     </div>

    <table class="table table-bordered  table-striped table-responsive table-condensed">
        <thead>
        <tr>

            <th width="5px">No</th>
            <th><a href="javascript:ajaxLoad('{{url('students?field=name&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Student Name</a>
                {{request()->session()->get('field')=='name'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>

            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('students?field=reg_no&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                   Registration No.
                </a>
                {{request()->session()->get('field')=='reg_no'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>
            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('students?field=course&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                   Course.
                </a>
                {{request()->session()->get('field')=='course'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>

            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('students?field=nationality&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Nationality
                </a>
                {{request()->session()->get('field')=='nationality'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>

            <th style="vertical-align: middle">
              <a href="javascript:ajaxLoad('{{url('students?field=dob&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                Date of Birth
              </a>
              {{request()->session()->get('field')=='dob'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>
            <th style="vertical-align: middle">
              <a href="javascript:ajaxLoad('{{url('students?field=gender&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                Gender
              </a>
              {{request()->session()->get('field')=='gender'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>
            <th style="vertical-align: middle">
              <a href="javascript:ajaxLoad('{{url('students?field=county&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                County
              </a>
              {{request()->session()->get('field')=='county'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>
            <th style="vertical-align: middle">
              <a href="javascript:ajaxLoad('{{url('students?field=email&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                Email
              </a>
              {{request()->session()->get('field')=='email'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>
            
            <th style="vertical-align: middle">
              <a href="javascript:ajaxLoad('{{url('students?field=phone_no&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                Phone No.
              </a>
              {{request()->session()->get('field')=='phone_no'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>
            <th  style="vertical-align: middle"> Show </th>
             <th  style="vertical-align: middle"> Edit </th>
             <th style="vertical-align: middle">  Delete</th>
             <th style="vertical-align: middle">  Print</th>

        </tr>
        </thead>
        <tbody>

        @php
            $i=0;
        @endphp
        @foreach ($students as $student)
          <tr>
          
            <td><b>{{++$i}}.</b></td>
            <td>{{$student->name}}</td>
            <td>{{$student->reg_no}}</td>
            <td>{{$student->course}}</td>
            <td>{{$student->nationality}}</td>
            <td>{{$student->dob}}</td>
            <td>{{$student->gender}}</td>
            <td>{{$student->county}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->phone_no}}</td>
            
            
            
            <td>
              <a class="btn btn-info btn-xs" title="Show"
                 href="javascript:ajaxLoad('{{url('students/show/'.$student->id)}}')">
                 <i class="fa fa-eye"></i>
                  Show</a>
            </td>
            <td>
                <a class="btn btn-warning btn-xs" title="Edit"
                   href="javascript:ajaxLoad('{{url('students/update/'.$student->id)}}')">
                   <i class="glyphicon glyphicon-pencil"></i>
                    Edit</a>
            </td>
            <td>
                <input type="hidden" name="_method" value="delete"/>
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxDelete('{{url('students/delete/'.$student->id)}}','{{csrf_token()}}')">
                   <i class="glyphicon glyphicon-trash"></i>
                    Delete
                </a>
            </td>
            <td>
              <a class="btn btn-primary btn-xs" title="Print"
                 href="javascript:ajaxLoad('{{url('students/print/'.$student->id)}}')">
                 <i class="fa fa-print"></i>
                  Pdf</a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

        <ul class="pagination">
            {{ $students->links() }}
        </ul>
</div>
</div>
</div>

</div>
</div>
