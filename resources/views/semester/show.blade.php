@extends('layouts.apps')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Semester</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('semester.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        
            <div class="form-group">
                <strong>Name:</strong>
                {{ $semester->name }}
            </div>
       
        
    </div>
@endsection