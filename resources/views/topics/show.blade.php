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
            <div class="box box-widget">
              <div class="box-header with-border">
                  <div class="user-block">
                      <img class="img-circle" src="{{asset('images/users/'. $post->user->getAvatar())}}" alt="User Image">
                   
                      <span class="username"><a href="{{ route('profile',['id' => $post->user->id]) }}">{{ $post->user->name }}</a></span>
                      <span class="description">posted - {{ $post->created_at->diffForHumans() }}</span>
                  </div>
                  @if($post->user->id == Auth::user()->id || $topic->forum->user->id == Auth::user()->id)
                    <div class="box-tools">
                      <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-angle-down"></i>
                          <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-right" role="menu">
                          <li><a href="#" data-toggle="modal" data-target="#editPost" data-postId="{{ $post->id }}">Edit Post</a></li>
                          <li>
                            <a href="#" onclick="destroy({{ $post->id }})">Delete Post</a>
                          </li>
                          <li class="divider"></li>
                          <li><a href="#">Hide Post</a></li>
                      </ul>
                    </div>
                  @endif
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
     var editor_config = {
    path_absolute : "/",
    selector: "textarea",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config); 

    $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
    });

    function destroy(id) {
        var r = confirm("Confirm Deletion");
        if (r == true) {
            $.ajax({
                url: '{{ url('posts') }}/'+id,
                type: 'DELETE',
                success: function(result) {
                    location.reload();
                }
            });
        } else {
            
        }
    }
  </script>
@endsection