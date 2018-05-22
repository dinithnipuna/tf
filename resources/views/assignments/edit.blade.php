@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('content')
      <div class="row">
      <h4><i class="fa fa-book m-r-10"></i> Assignments</h4>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="/assignments"><i class="fa fa-book"></i> Assignments</a></li>
          <li class="active">Edit Assignment</li>
        </ol>
        <div class="col">
          <div class="widget">             
              <!-- form start -->
              <form role="form" action="{{route('assignments.update', $assignment->id)}}" method="POST">
              {{csrf_field()}}   
              {{ method_field('PUT') }}         
                  <div class="form-group">
                          <label for="class_id">Class</label>
                          <select class="form-control" id="class_id" name="class_id">
                            @foreach (Auth::user()->clses as $class)
                              <option value="{{$class->id}}" {{ $class->id == $assignment->class_id ? 'selected' : ''}}>{{$class->name}}</option>
                            @endforeach
                          </select>
                  </div>        
                  <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" name="title" value="{{ $assignment->title }}" id="title">
                  </div>
                  <div class="form-group">
                      <label for="body">Body</label>
                      <textarea class="form-control input-lg p-text-area" rows="2" name="body">{{ $assignment->body }}</textarea>
                  </div>

                  <button type="submit" class="btn btn-primary">Save Changes to Assignment</button>
                     
              </form>   
            </div>
        </div>
      </div>
@endsection