@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('content')
      <div class="row">
        <!-- left links -->
        <div class="col-md-3">
          <div class="profile-nav">
            <div class="widget">
              <div class="widget-body">
                <div class="user-heading round">
                  <a href="#">
                      <img src="{{ asset('images/users/'. Auth::user()->getAvatar()) }}" alt="User profile picture">
                  </a>
                  <h1>{{ Auth::user()->name }}</h1>
                  <p>@username</p>
                </div>
                <ul class="nav nav-pills nav-stacked">
               {{--    <li class="active"><a href="#"> <i class="fa fa-globe"></i> News feed</a></li>
                  
                  <li><a href="#"> <i class="fa fa-calendar"></i> Events</a></li>
                  <li><a href="#"> <i class="fa fa-image"></i> Photos</a></li> --}}
                  <li>
                    <a href="/messages"> 
                      <i class="fa fa-envelope"></i> Messages 
                      {{-- <span class="label label-info pull-right r-activity">9</span> --}}
                    </a>
                  </li>
                  @role(['teacher'])
                  <li>
                    <a href="/assignments"> 
                      <i class="fa fa-file"></i> Assignment Board
                    </a>
                  </li>
                  @endrole
                  @role(['student'])
                  <li>
                    <a href="/profile/assignments"> 
                      <i class="fa fa-file"></i> Assignment Board
                    </a>
                  </li>
                  <li>
                    <a href="/notebooks"> 
                      <i class="fa fa-book"></i> Notebooks
                      {{-- <span class="label label-info pull-right r-activity">{{ Auth::user()->notebooks()->count() }}</span> --}}
                    </a>
                  </li>
                  @endrole
                  <li><a href="#"> <i class="fa fa-floppy-o"></i> Saved</a></li> 
                  <li>
                    <script async type="text/javascript" src="../../cdn.carbonads.com/carboned55.js?zoneid=1673&amp;serve=C6AILKT&amp;placement=bootdeycom" id="_carbonads_js"></script>
                  </li>
                </ul>
              </div>
            </div>

            <div class="widget">
              <div class="widget-body">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="/profile/classes"> <i class="fa fa-pencil-square-o"></i> Classes</a></li>
                  <li><a href="/forums"> <i class="fa fa-comments"></i> Forums</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div><!-- end left links -->


        <!-- center posts -->
        <div class="col-md-6">
          <div class="row">
            <!-- left posts-->
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                <!-- post state form -->
                  <div class="box profile-info n-border-top">
                    <form role="form" action="{{route('posts.store')}}" method="POST">
                        {{csrf_field()}} 
                        <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Whats in your mind today?" name="body" id="postBody"></textarea>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="box-footer box-form">
                            <button type="submit" class="btn btn-azure pull-right">Post</button>
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-map-marker"></i></a></li>
                                <li><a href="#"><i class="fa fa-camera"></i></a></li>
                                <li><a href="#"><i class=" fa fa-film"></i></a></li>
                                <li><a href="#"><i class="fa fa-microphone"></i></a></li>
                            </ul>
                        </div>
                    </form>
                  </div><!-- end post state form -->


                  @if(!$posts->count())
                      <p>There's nothing on yout timeline, yet.</p>
                  @else
                      @foreach($posts as $post)
                          <div class="box box-widget">
                              <div class="box-header with-border">
                                <div class="user-block">
                                  <img class="img-circle" src="{{asset('images/users/'. $post->user->getAvatar())}}" alt="User Image">
                                 
                                  <span class="username">
                                    <a href="{{ route('profile',['id' => $post->user->id]) }}">{{ $post->user->name }}</a>
                                    @if($post->user->id != $post->postable_id)
                                       <i class="fa fa-caret-right"></i> <a href="{{ route('profile',['id' => $post->postableUser->id]) }}">{{ $post->postableUser->name }}'s</a> Timeline
                                    @endif
                                  </span>
                                  <span class="description">Shared publicly - {{ $post->created_at->diffForHumans() }}</span>
                                </div>

                                @if($post->user->id == Auth::user()->id || $post->postable_id == Auth::user()->id)

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

                              <div class="box-body" style="display: block;">
                                
                                <div id="post-body-{{ $post->id }}">{!! $post->body !!}</div>

                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                                <a href="{{route('posts.like',['postId' => $post->id])}}" type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</a>
                                <span class="pull-right text-muted">127 likes - {{ $post->replies()->count()}} comments</span>
                              </div>
                              <div class="box-footer box-comments" style="display: block;">
                              @foreach($post->replies as $reply)
                                <div class="box-comment">
                                    <img class="img-circle img-sm" src="{{asset('images/users/'. $reply->user->getAvatar())}}" alt="User Image">
                                  <div class="comment-text">
                                    <span class="username">
                                    {{ $reply->user->name }}
                                    <span class="text-muted pull-right">{{ $reply->created_at->diffForHumans() }}</span>
                                    </span>
                                    {{ $reply->body }}
                                  </div>
                                </div>
                              @endforeach
                              </div>
                              <div class="box-footer" style="display: block;">
                                <form role="form" action="{{route('posts.reply',['postId' => $post->id])}}" method="POST">
                                    <img class="img-responsive img-circle img-sm" src="{{asset('images/users/'. Auth::user()->getAvatar())}}" alt="User Image">
                                  <div class="img-push">
                                    {{csrf_field()}}
                                    <input type="text" name="reply-{{ $post->id }}" class="form-control input-sm" placeholder="Press enter to post comment">
                                  </div>
                                </form>
                              </div>
                          </div>
                      @endforeach
                  @endif

                </div>
              </div>
            </div><!-- end left posts-->
          </div>
        </div><!-- end  center posts -->




        <!-- right posts -->
        <div class="col-md-3">
          <!-- Friends activity -->
          <div class="widget">
            <div class="widget-header">
              <h3 class="widget-caption">Users activity</h3>
            </div>
            <div class="widget-body bordered-top bordered-sky">
              <div class="card">
                <div class="content">
                   @include('activity')
                </div>
              </div>
            </div>
          </div><!-- End Friends activity -->

          <!-- People You May Know -->
          <div class="widget">
            <div class="widget-header">
              <h3 class="widget-caption">People You May Know</h3>
            </div>
            <div class="widget-body bordered-top bordered-sky">
              <div class="card">
                  <div class="content">
                      <ul class="list-unstyled team-members">
                          <li>
                              <div class="row">
                                  <div class="col-xs-3">
                                      <div class="avatar">
                                          <img src="img/Friends/guy-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                      </div>
                                  </div>
                                  <div class="col-xs-6">
                                     Carlos marthur
                                  </div>
                      
                                  <div class="col-xs-3 text-right">
                                      <btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user-plus"></i></btn>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="row">
                                  <div class="col-xs-3">
                                      <div class="avatar">
                                          <img src="img/Friends/woman-1.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                      </div>
                                  </div>
                                  <div class="col-xs-6">
                                      Maria gustami
                                  </div>
                      
                                  <div class="col-xs-3 text-right">
                                      <btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user-plus"></i></btn>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="row">
                                  <div class="col-xs-3">
                                      <div class="avatar">
                                          <img src="img/Friends/woman-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                      </div>
                                  </div>
                                  <div class="col-xs-6">
                                      Angellina mcblown
                                  </div>
                      
                                  <div class="col-xs-3 text-right">
                                      <btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user-plus"></i></btn>
                                  </div>
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>          
            </div>
          </div><!-- End people yout may know --> 
        </div><!-- end right posts -->
      </div>

      <!-- Edit Product Modal -->
<div class="modal fade" id="editPost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form role="form" action="#" method="POST" id='editForm'>
    {{csrf_field()}}   
    {{ method_field('PUT') }}    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Post</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" value="" name="post_id" id="post_id">
        <div class="form-group">
          <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Whats in your mind today?" name="body" id="body"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Update Post</button>
      </div>
       </form>
    </div>
  </div>
</div>
@endsection

@section('script') 
  <!-- TinyMCE -->
  <script src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
  <script>
    $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

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
    setup: function (editor) {
                  editor.on('change', function () {
                      tinymce.triggerSave();
                  });
                },
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
  
    $(function() {
      $('#editPost').on('shown.bs.modal', function (event) {
          var modal = $(this);
          var button = $(event.relatedTarget) // Button that triggered the modal
          var postid = button.data('postid') // Extract info from data-* attributes

          $.get('/posts/'+ postid +'/edit', function(data) {
              tinyMCE.remove();
              modal.find('.modal-body #post_id').val(data.id);
              modal.find('.modal-body #body').val(data.body);
              tinymce.init(editor_config);
          });
      });

      $( "#editForm" ).submit(function( event ) {
        event.preventDefault();

        $.post('{{ route('posts.update',1) }}', $.param($(this).serializeArray()), function(data) {
              $('#editPost').modal('hide'); 
              $('#post-body-'+data.id).html(data.body);      
        });
      });
    });

    // Prevent Bootstrap dialog from blocking focusin
$(document).on('focusin', function(e) {
  if ($(e.target).closest(".mce-window").length) {
    e.stopImmediatePropagation();
  }
});

  function destroy(id) {
      var r = confirm("Confirm Deletion");
      if (r == true) {
          $.ajax({
              url: 'posts/'+id,
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