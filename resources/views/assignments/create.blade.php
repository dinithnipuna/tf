@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('script') 
  <!-- TinyMCE -->
  <script src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
  <script>
    tinymce.init({
      selector:'textarea',
      file_browser_callback_types: 'file image media'
    });
  </script>
@endsections

@section('content')
      <div class="row">
      <h4><i class="fa fa-book m-r-10"></i> Assignments</h4>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="/assignments"><i class="fa fa-book"></i> Assignments</a></li>
          <li class="active">Create New Assignment</li>
        </ol>
        <div class="col">
          <div class="widget">
             
              <!-- form start -->
                    <form role="form" action="{{route('assignments.store')}}" method="POST">
                      {{csrf_field()}} 
                        <div class="form-group">
                          <label for="class_id">Class</label>
                          <select class="form-control" id="class_id" name="class_id">
                            @foreach (Auth::user()->clses as $class)
                              <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                          </select>
                        </div>        
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{old('title')}}" id="title">
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea class="form-control input-lg p-text-area" rows="2" name="body"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Create New Assignment</button>
                           
                    </form>   
            </div>
        </div>
      </div>
@endsection