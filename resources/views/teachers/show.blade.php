@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('style') 
  <!-- bootstrap datepicker -->
  <link href="{{ asset('/assets/css/profile2.css') }}" rel="stylesheet">
@endsection

@section('content')
      <div class="row" id="user-profile">
        <div class="col-md-4 col-xs-12">
          <div class="row-xs">
            <div class="main-box clearfix">
              <h2>{{ $user->name }}</h2>
              <div class="profile-status">
                <i class="fa fa-check-circle"></i> Teacher
              </div>
              <img src="{{asset('images/users/'. $user->getAvatar())}}" alt="User profile picture" class="profile-img img-responsive center-block show-in-modal">
               
              <div class="profile-details">
                <ul class="fa-ul">
                  <li><i class="fa-li fa fa-user"></i>Requests: <span>{{ $requests->count() }}</span></li>
                  <li><i class="fa-li fa fa-users"></i>Classes: <span>{{ $classes->count() }}</span></li>
                  <li><i class="fa-li fa fa-comments"></i>Posts: <span>{{ $posts->count() }}</span></li>
                </ul>
              </div>
              
              <div class="profile-message-btn center-block text-center">
                {{-- <a href="/messages/{{ $user->id }}/create" class="btn btn-azure">
                  <i class="fa fa-envelope"></i>
                  Send message
                </a> --}}
                @if($user->id != Auth::user()->id)
                <a href="" class="btn btn-azure" data-toggle="modal" data-target="#modalShow">
                  <i class="fa fa-envelope"></i>
                  Send message
                </a>
                @endif
              </div>

              
              
              <div class="profile-message-btn center-block text-center">
                <br>
                <ul class="list-group">
                  <li class="list-group-item">
                  @if(Auth::user()->hasFriendRequestPending($user))
                      <p>Waiting for {{ $user->name }} to accept your request.</p>
                  @elseif(Auth::user()->hasFriendRequestsReceived($user))
                      <a href="#" class="btn btn-primary"><i class="fa fa-envelope"></i>Accept Join Request</a>
                  @elseif(Auth::user()->isFriendWith($user))

                    <form action="{{ route('friends.leave', ['userId' => $user->id]) }}" method="POST">
                        <input type="submit" name="" class="btn btn-danger" value="Leave me">
                        {{csrf_field()}} 
                    </form>
                  @else
                    @if($user->id != Auth::user()->id)
                      <a href="{{ route('friends.join',['userId' => $user->id]) }}" class="btn btn-primary"><i class="fa fa-user"></i>Join with me</a>
                    @endif
                  @endif
                    <script async type="text/javascript" src="../../cdn.carbonads.com/carboned55.js?zoneid=1673&amp;serve=C6AILKT&amp;placement=bootdeycom" id="_carbonads_js"></script>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-8 col-xs-12">
          <div class="row-xs">
            <div class="main-box clearfix">
              <div class="row profile-user-info">
                <div class="col-sm-8">
                  <div class="profile-user-details clearfix">
                  <?php $names = explode(" ", $user->name); ?>
                    <div class="profile-user-details-label">
                      First Name
                    </div>
                    <div class="profile-user-details-value">
                      {{ $names[0] }}
                    </div>
                  </div>
                  @if(count($names) > 1)
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Last Name
                    </div>
                    <div class="profile-user-details-value">
                      {{ $names[1] }}
                    </div>
                  </div>
                  @endif
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Address
                    </div>
                    <div class="profile-user-details-value">
                      {{ $user->address }}
                    </div>
                  </div>
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Email
                    </div>
                    <div class="profile-user-details-value">
                      {{ $user->email }}
                    </div>
                  </div>
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Phone number
                    </div>
                    <div class="profile-user-details-value">
                      {{ $user->phone }}
                    </div>
                  </div>
                </div>
                <div class="col-sm-4 profile-social">
                  <ul class="fa-ul">
                    <li><i class="fa-li fa fa-twitter-square"></i><a href="#">@johnbrewk</a></li>
                    <li><i class="fa-li fa fa-linkedin-square"></i><a href="#">John Breakgrow jr.</a></li>
                    <li><i class="fa-li fa fa-facebook-square"></i><a href="#">John Breakgrow jr.</a></li>
                    <li><i class="fa-li fa fa-skype"></i><a href="#">john_smart</a></li>
                    <li><i class="fa-li fa fa-instagram"></i><a href="#">john_smart</a></li>
                  </ul>
                </div>
              </div>
              
              <div class="tabs-wrapper profile-tabs">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab-timeline" data-toggle="tab">Timeline</a></li>
                  <li><a href="#tab-following" data-toggle="tab">Classes</a></li>
                  <li><a href="#tab-requests" data-toggle="tab">Requests</a></li>
                </ul>
                
                <div class="tab-content">
                  <div class="tab-pane fade in active" id="tab-timeline">
                    <div class="row">
                      <div class="col-md-12">
                      <!-- post state form -->
                      <div class="box profile-info n-border-top">
                        <form role="form" action="{{route('posts.store')}}" method="POST">
                            {{csrf_field()}} 
                            <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Whats in your mind today?" name="body" id="postBody"></textarea>
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="box-footer box-form">
                                <button type="submit" class="btn btn-azure">Post</button>
                            </div>
                        </form>
                      </div><!-- end post state form -->
                      <!--   posts -->
                      @if(!$posts->count())
                      <p>There's nothing on yout timeline, yet.</p>
                      @else
                      @foreach($posts as $post)
                          <div class="box box-widget">
                              <div class="box-header with-border">
                                <div class="user-block">
                                  <img class="img-circle" src="{{asset('images/users/'. $post->user->getAvatar())}}" alt="User Image">
                                  <span class="username"><a href="#">{{ $post->user->name }}</a></span>
                                  <span class="description">Shared publicly - {{ $post->created_at->diffForHumans() }}</span>
                                </div>

                                @if($post->user->id == Auth::user()->id || $user->id == Auth::user()->id)

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
                  </div>
                  
                  <div class="tab-pane fade" id="tab-following">
                    <ul class="widget-users row">

                    @foreach ($classes as $class)                 
                        <li class="col-md-4">
                          <div class="img">
                            <img src="{{ asset('/images/class_icon.png') }}" alt="">
                          </div>
                          <div class="details">
                            <div class="name">
                              <a href="{{ route('classes.show',['id'=>$class->id]) }}">{{$class->name}}</a>
                            </div>
                            @if(!Auth::user()->isJoinWithClass($class))
                                <div class="type">
                                    <a href="{{ route('classes.join',['classId' => $class->id]) }}" class="btn btn-warning">
                                        <i class="fa fa-plus"></i>
                                        Join Class
                                    </a>
                                </div>
                            @else
                                <div class="type">
                                    <a href="{{ route('classes.leave',['classId' => $class->id]) }}" class="btn btn-danger">
                                        <i class="fa fa-close"></i>
                                        Leave Class
                                    </a>
                                </div>
                            @endif                                  
                          </div>
                        </li>
                    @endforeach
                      
                    </ul>
                    <br>
                    <a href="#" class="btn btn-azure pull-right">
                      <i class="fa fa-refresh"></i>
                      Load more
                    </a>
                  </div>
                  
                  <div class="tab-pane fade" id="tab-requests">
                    <ul class="widget-users row">
                  @if($user->id == Auth::user()->id)
                    @if(!$requests->count())
                        <p>You have no join requests.</p>
                    @else
                        @foreach($requests as $user)
                            <li class="col-md-6">
                              <div class="img">
                                <img src="img/Friends/woman-6.jpg" alt="">
                              </div>
                              <div class="details">
                                <div class="name">
                                  <a href="{{ route('profile',['id' => $user->id]) }}">{{ $user->name }}</a>
                                </div>
                                <div class="time">
                                  <i class="fa fa-clock-o"></i> Last online: 5 minutes ago
                                </div>
                                <div class="type">
                                      <a href="{{ route('friends.accept',['userId' => $user->id]) }}" class="btn btn-warning">
                                        <i class="fa fa-user"></i>
                                        Accept Join Request
                                      </a>
                                  </div>
                              </div>
                            </li>
                        @endforeach
                    @endif
                    @endif
                    </ul>
                    <br>
                    <a href="#" class="btn btn-azure pull-right">
                      <i class="fa fa-refresh"></i>
                      Load more
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    {{-- <!-- Online users sidebar content-->
    <div class="chat-sidebar focus">
      <div class="list-group text-left">
        <p class="text-center visible-xs"><a href="#" class="hide-chat btn btn-success">Hide</a></p> 
        <p class="text-center chat-title">Online users</p>  
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/guy-2.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Jeferh Smith</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="img/Friends/woman-1.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Dapibus acatar</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/guy-3.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Antony andrew lobghi</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-2.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Maria fernanda coronel</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/guy-4.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Markton contz</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="img/Friends/woman-3.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Martha creaw</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="img/Friends/woman-8.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Yira Cartmen</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-4.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Jhoanath matew</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-5.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Ryanah Haywofd</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-9.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Linda palma</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-10.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Andrea ramos</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/child-1.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Dora ty bluekl</span>
        </a>        
      </div>
    </div><!-- Online users sidebar content--> --}}

    <!-- Modal -->
    <div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
         <form role="form" action="#" method="POST" id="messageForm">
         {{ method_field('put') }}
         {{ csrf_field() }}
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ $user->name }}</h4>
          </div>
          <div class="modal-body text-centers">          
              <div class="form-group">
                  <label class="control-label">Message</label>
                  <textarea name="message" class="form-control">{{ old('message') }}</textarea>
              </div>
              <input type="hidden" value="{{ $user->id }}" name="user_id">            
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Send</button>
          </div>
          </form>
        </div>
      </div>
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
  
    $(function() {
      $("#messageForm").submit(function( event ) {
        event.preventDefault();

        $.post('{{ route('messages.update',$user->id) }}', $.param($(this).serializeArray()), function(data) {
              $('#modalShow').modal('hide');     
        });
      });
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