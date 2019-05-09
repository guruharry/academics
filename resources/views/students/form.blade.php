<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-body">
        <h1>{{isset($student)?'Edit':'New'}} Student</h1>
        <hr/>
        @if(isset($student))
            {!! Form::model($student,['method'=>'PUT','id'=>'frm']) !!}
        @else
            {!! Form::open(['id'=>'frm']) !!}
        @endif

     
 



<div class="form-group row required">
            {!! Form::label("image","Image",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::file("image",null,["class"=>"form-control".($errors->has('image')?" is-invalid":""),"autofocus",'placeholder'=>'Image']) !!}
                <span id="error-image" class="invalid-feedback"></span>
            </div>
        </div>


    <div class="form-group row required">
            {!! Form::label("course","Course",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
               <select class="form-control" name="course">
                @foreach($courses as $course)  {{$course->name ? 'selected' : ''}}
                  <option  value="{{$course->name}}">{{$course->name}}</option>
                @endforeach
               </select>
                <span id="error-name" class="invalid-feedback"></span>
            </div>
    </div> 
  
    <div class="form-group row required">
            {!! Form::label("name","Name",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("name",null,["class"=>"form-control".($errors->has('name')?" is-invalid":""),"autofocus",'placeholder'=>'name']) !!}
                <span id="error-name" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("reg_no","Nationality",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("reg_no",null,["class"=>"form-control".($errors->has('reg_no')?" is-invalid":""),"autofocus",'placeholder'=>'reg_no']) !!}
                <span id="error-reg_no" class="invalid-feedback"></span>
            </div>
        </div>


         <div class="form-group row required">
            {!! Form::label("nationality","Nationality",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("nationality",null,["class"=>"form-control".($errors->has('nationality')?" is-invalid":""),"autofocus",'placeholder'=>'Nationality']) !!}
                <span id="error-nationality" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("dob","Date of Birth",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("dob",null,["class"=>"form-control".($errors->has('dob')?" is-invalid":""),"autofocus",'placeholder'=>'Date of Birth']) !!}
                <span id="error-dob" class="invalid-feedback"></span>
            </div>
        </div>
         <div class="form-group row required">
            {!! Form::label("gender","Gender",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">

                {!! Form::select("gender", array('Male' => 'Male', 'Female' => 'Female') ,["class"=>"col-form-label col-md-3 col-lg-2"])!!}
                <span id="error-gender" class="invalid-feedback"></span>
            </div>
        </div>
         <div class="form-group row required">
            {!! Form::label("county","County",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("county",null,["class"=>"form-control".($errors->has('county')?" is-invalid":""),"autofocus",'placeholder'=>'County']) !!}
                <span id="error-county" class="invalid-feedback"></span>
            </div>
        </div>   
            

         <div class="form-group row required">
            {!! Form::label("email","Email",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("email",null,["class"=>"form-control".($errors->has('email')?" is-invalid":""),"autofocus",'placeholder'=>'Email']) !!}
                <span id="error-email" class="invalid-feedback"></span>
            </div>
        </div>
         <div class="form-group row required">
            {!! Form::label("address","Address",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("address",null,["class"=>"form-control".($errors->has('address')?" is-invalid":""),"autofocus",'placeholder'=>'Address']) !!}
                <span id="error-address" class="invalid-feedback"></span>
            </div>
        </div>
         <div class="form-group row required">
            {!! Form::label("phone_no","Phone No.",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("phone_no",null,["class"=>"form-control".($errors->has('phone_no')?" is-invalid":""),"autofocus",'placeholder'=>'Phone No.']) !!}
                <span id="error-phone_no" class="invalid-feedback"></span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 col-lg-2"></div>
            <div class="col-md-4">
                <a href="javascript:ajaxLoad('{{url('students')}}')" class="btn btn-danger btn-xs">
                    Back</a>
               
                    
                     {!! Form::button("Save",["type" => "submit","class"=>"btn btn-primary btn-xs"])!!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>

</div>
</div>
</div>
</div>
</div>

