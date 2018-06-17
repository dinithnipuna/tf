@extends('layouts.admin')

@section('page_header')
  <h1> Classes <small>Edit Class</small> </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/classes"><i class="fa fa-users"></i> Classs</a></li>
    <li class="active">Edit Class</li>
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
                    <form role="form" action="{{route('classes.update', $class->id)}}" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}   
                      {{ method_field('PUT') }}   
                      <div class="col-md-8">
                          <div class="form-group">
                            <label for="name">Class Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $class->name }}" id="name">
                        </div>

                        <div class="form-group">
                          <label for="grade_id">Grade</label>
                          <select class="form-control" id="grade_id" name="grade_id">
                            @foreach ($grades as $grade)
                              <option value="{{$grade->id}}" {{ ($grade->id == $class->grade_id) ? 'selected' : '' }}>{{$grade->name}}</option>
                            @endforeach
                          </select>
                        </div> 

                        <div class="form-group">
                          <label for="subject_id">Subject</label>
                          <select class="form-control" id="subject_id" name="subject_id">
                            @foreach ($subjects as $subject)
                              <option value="{{$subject->id}}" {{ ($subject->id == $class->subject_id) ? 'selected' : '' }}>{{$subject->name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" name="type" value="{{ $class->type }}" id="type">
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes to Class</button>
                      </div>   
                      <div class="col-md-4">
                              <div class="well">
                                <label for="cover">Profile Cover</label>
                                    <center>
                                      <img class="profile-user-img img-responsive" src="{{ asset('images/covers/'. $class->getCover())}}" alt="User profile picture" height="100">  
                                    </center>
                                  <hr/>
                                  <input type="file" name="cover"/>
                              </div>
                          </div> 
                           
                    </form>   
                  </div>
              </div>
          </div><!-- /.box -->
      </div>
    </div>
</div>
@endsection