@extends('layouts.apps')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('semester.index') }}"> Back</a>
        </div>
    </div>
</div>  
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('semester.store') }}" method="POST">
    
     {{ csrf_field() }}
  
     <div class="row">
        
        <div class="form-group">    
              <label for="name"> Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection