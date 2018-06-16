@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('content')
  <div class="row">     
      <div class="col-lg-3">
        <a href="{{ route('profile',['id' => $post->user->id]) }}">
            <img src="{{ asset('images/users/'. $post->user->getAvatar()) }}" alt="User profile picture" class="img-circle">
        </a>
        <h3>{{ $post->user->name }}</h3>
        <a class="btn btn-link btn-block" href="{{ route('topics.show',$post->postable_id) }}">
                <i class="fa fa-arrow-left"></i> Back
        </a>
      </div>
      <div class="col-lg-9">

          <div class="panel panel-default">
              <div class="panel-heading topic-info">
                  <div class="user-block">
                      <img class="img-circle" src="{{asset('images/users/'. $post->user->getAvatar())}}" alt="User Image">
                   
                      <span class="username"><a href="{{ route('profile',['id' => $post->user->id]) }}">{{ $post->user->name }}</a></span>
                      <span class="description">posted - {{ $post->created_at->diffForHumans() }}</span>
                  </div>
              </div>
              <div class="panel-body">{!! $post->body !!} </div>
          </div>

          @if(!$post->replies()->count())
                <p>No Replies, yet.</p>
          @else
            @foreach($post->replies as $reply)
            <div class="panel panel-default">
              <div class="panel-heading topic-info">
              	  <div class="pull-right">
              	  		@if($post->solution_id == $reply->id)
              	  			<span class="label label-success">Solution</span>
              	  		@elseif($post->user->id == Auth::user()->id)
							<form role="form" action="{{route('post.solution',['postId' => $reply->id])}}" method="POST">
                				{{csrf_field()}} 
                				<input type="hidden" value="{{ $post->id }}" name="post_id">
				                <button type="submit" class="btn btn-success btn-sm">Mark As Solution</button>
				            </form>
			        	@endif
			      </div>
                  <div class="user-block">
                      <img class="img-circle" src="{{asset('images/users/'. $reply->user->getAvatar())}}" alt="User Image">
                   
                      <span class="username"><a href="{{ route('profile',['id' => $reply->user->id]) }}">{{ $reply->user->name }}</a></span>
                      <span class="description">replied - {{ $reply->created_at->diffForHumans() }}</span>
                  </div>
              </div>
              <div class="panel-body">{!! $reply->body !!} </div>
            </div>
            @endforeach
          @endif 

          <!-- post state form -->
          <div class="box profile-info n-border-top">
            <form role="form" action="{{route('posts.reply',['postId' => $post->id])}}" method="POST">
                {{csrf_field()}} 
                <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Whats in your mind today?" name="reply-{{ $post->id }}"></textarea>
            
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
  </script>
@endsection