@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('content')
  <div class="row">
      <h4><i class="fa fa-file m-r-10"></i> {{ $topic->name }}</h4>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ route('forums.show',$topic->forum->id) }}"><i class="fa fa-file"></i> Topics</a></li>
        <li class="active">{{ $topic->name }}</li>
      </ol>
      
      <div class="col-lg-3">
        <h1>{{ $topic->name }}</h1>
        {!! $topic->description !!}
      </div>
      <div class="col-lg-9">

          <!-- post state form -->
          <div class="box profile-info n-border-top">
            <form role="form" action="{{route('posts.store')}}" method="POST">
                {{csrf_field()}} 
                <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Whats in your mind today?" name="body" id="postBody"></textarea>
                <input type="hidden" name="post_type" value="App\Topic">
                <input type="hidden" name="topic_id" value="{{ $topic->id }}">
            
                <div class="box-footer box-form">
                    <button type="submit" class="btn btn-azure pull-right">Post</button>
                    <ul class="nav nav-pills">
                       {{--  <li><a href="#"><i class="fa fa-map-marker"></i></a></li>
                        <li><a href="#"><i class="fa fa-camera"></i></a></li>
                        <li><a href="#"><i class=" fa fa-film"></i></a></li>
                        <li><a href="#"><i class="fa fa-microphone"></i></a></li> --}}
                    </ul>
                </div>
            </form>
          </div><!-- end post state form -->

          @if(!$posts->count())
                <p>No Post, yet.</p>
          @else
            @foreach($posts as $post)
            <div class="panel panel-default">
              <div class="panel-heading topic-info">
                  <div class="user-block">
                      <img class="img-circle" src="{{asset('images/users/'. $post->user->getAvatar())}}" alt="User Image">
                   
                      <span class="username"><a href="{{ route('profile',['id' => $post->user->id]) }}">{{ $post->user->name }}</a></span>
                      <span class="description">posted - {{ $post->created_at->diffForHumans() }}</span>
                  </div>
              </div>
              <div class="panel-body"><a href="{{ route('topic.post',$post->id) }}">{{ substr(strip_tags($post->body),0,100) }} </a></div>
            </div>
            @endforeach
          @endif 

          {{ $posts->links() }}
      </div>
  </div>
@endsection

@section('script') 
  <!-- TinyMCE -->
  <script src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
  <script>
    tinymce.init({ 
      selector:'textarea',
      plugins: "code media",
    });  
  </script>
@endsection