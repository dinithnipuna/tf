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
      <div class="row">
      <h4><i class="fa fa-file-alt m-r-10"></i> Topics</h4>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="{{ route('forums.show',$forum_id) }}"><i class="fa fa-book"></i> Topics</a></li>
          <li class="active">Create New Topic</li>
        </ol>
        <div class="col">
          <div class="widget">
             
              <!-- form start -->
                    <form role="form" action="{{route('topics.store')}}" method="POST">
                      {{csrf_field()}}      
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control input-lg p-text-area" rows="2" name="description"></textarea>
                        </div>

                        <input type="hidden" value="{{ $forum_id }}" name="forum_id">

                        <button type="submit" class="btn btn-primary">Create New Topic</button>
                           
                    </form>   
            </div>
        </div>
      </div>
@endsection