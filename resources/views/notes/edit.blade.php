@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('script') 
  <!-- TinyMCE -->
  <script src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section('content')
<div class="container page-content">
      <div class="row">
      <h4><i class="fa fa-file-alt m-r-10"></i> Notes</h4>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="{{ route('notebooks.show',$note->notebook->id) }}"><i class="fa fa-book "></i> Notes</a></li>
          <li class="active">Edit Note</li>
        </ol>
        <div class="col">
          <div class="widget">
             
              <!-- form start -->
                    <form role="form" action="{{route('notes.update',$note->id)}}" method="POST">
                      {{csrf_field()}}  
                      {{ method_field('PUT') }}      
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $note->title }}" id="title">
                        </div>

                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea class="form-control input-lg p-text-area" rows="2" name="body">{{ $note->body }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes to Note</button>
                           
                    </form>   
            </div>
        </div>
      </div>
    </div>
@endsection