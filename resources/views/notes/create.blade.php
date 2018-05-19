@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('style') 

@endsection

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
          <li><a href="{{ route('notebooks.show',$notebook) }}"><i class="fa fa-book"></i> Notes</a></li>
          <li class="active">Create New Note</li>
        </ol>
        <div class="col">
          <div class="widget">
             
              <!-- form start -->
                    <form role="form" action="{{route('notes.store')}}" method="POST">
                      {{csrf_field()}}      
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{old('title')}}" id="title">
                        </div>

                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea class="form-control input-lg p-text-area" rows="2" name="body"></textarea>
                        </div>

                        <input type="hidden" value="{{ $notebook }}" name="notebook">

                        <button type="submit" class="btn btn-primary">Create New Note</button>
                           
                    </form>   
            </div>
        </div>
      </div>
    </div>
@endsection