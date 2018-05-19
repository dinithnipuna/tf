@extends('layouts.admin')

@section('page_header')
  <h1> Classes <small>Add New Class</small> </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/classes"><i class="fa fa-users"></i> Classs</a></li>
    <li class="active">Add New Class</li>
  </ol>
@endsection

@section('content')
 <div class="container-fluid">
  	<div class="row">
      <div class="col">
          <div class="panel panel-default">
                <div class="panel-body"> 
                  <div class="collapse in">
                    <!-- form start -->
                    <form role="form" action="{{route('classes.store')}}" method="POST">
                      {{csrf_field()}}      
                        <div class="form-group">
                            <label for="name">Class Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
                        </div>

                        <div class="form-group">
                          <label for="grade_id">Grade</label>
                          <select class="form-control" id="grade_id" name="grade_id">
                            @foreach ($grades as $grade)
                              <option value="{{$grade->id}}">{{$grade->name}}</option>
                            @endforeach
                          </select>
                        </div> 

                        <div class="form-group">
                          <label for="subject_id">Subject</label>
                          <select class="form-control" id="subject_id" name="subject_id">
                            @foreach ($subjects as $subject)
                              <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" name="type" value="{{old('type')}}" id="type">
                        </div>

                        <button type="submit" class="btn btn-primary">Create New Class</button>
                           
                    </form>   
                  </div>
              </div>
          </div><!-- /.box -->
      </div>
    </div>
</div>
@endsection