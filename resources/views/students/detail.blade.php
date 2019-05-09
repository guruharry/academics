<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <h2>STUDENT PROFILE</h2>
    
</div>
                <div class="panel-body">
   


       <div class="form-group">
    <strong>Image  : </strong> 
        
        <table  >
          <td>
            <img src="/images/{{$student->image}}" width="200px" height="200px" alt="Student Image" />
          </td>
        </table>
        </div>

        <div class="form-group">
    <strong>Name  : </strong> {{$student->name}}
        </div>
      
    <div class="form-group">
          <strong>Registration Number : </strong> {{$student->reg_no}}
        </div>
      
    
        <div class="form-group">
          <strong>Nationality : </strong> {{$student->nationality}}
        </div>
      
     
        <div class="form-group">
          <strong>Date of Birth : </strong> {{$student->dob}}
        </div>
     
  
        <div class="form-group">
          <strong>Gender : </strong> {{$student->gender}}
        </div>
      
  
        <div class="form-group">
          <strong>County : </strong> {{$student->county}}
        </div>
    
     
        <div class="form-group">
          <strong>Email : </strong> {{$student->email}}
        </div>
  
     
        <div class="form-group">
          <strong>Phone Number : </strong> {{$student->phone_no}}
        </div>
  
    
        <div class="form-group">
          <strong>Address : </strong> {{$student->address}}
        </div>

    <a class="btn btn-xs btn-danger" href="javascript:ajaxLoad('{{ url('students') }}')">Back</a>
    </div>
  </div>
</div>
</div>
</div>