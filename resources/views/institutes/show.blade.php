@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('style') 
  <!-- bootstrap datepicker -->
  <link href="{{ asset('/assets/css/profile3.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
      <div class="col-md-10 col-md-offset-1">
      <div class="user-profile">
        <div class="profile-header-background">
          <img src="{{asset('images/covers/'. $user->getCover())}}" alt="Profile Header Background">
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="profile-info-left">
              <div class="text-center">
                  <img src="{{asset('images/users/'. $user->getAvatar())}}" alt="Avatar" class="avatar img-circle">
                  <h2>{{ $user->name }}</h2>
              </div>
              <div class="action-buttons">
                <div class="row">
                  @if(Auth::user()->hasFriendRequestPending($user))
                    <div class="col-xs-12 text-center">
                        <div class="alert alert-info">
                          Waiting for <strong>{{ $user->name }}</strong> to accept your request.
                        </div>
                    </div>
                  @elseif(Auth::user()->hasFriendRequestsReceived($user))
                      <div class="col-xs-6"><a href="#" class="btn btn-primary"><i class="fa fa-envelope"></i>Accept Join Request</a></div>
                  @elseif(Auth::user()->isFriendWith($user))  
                    @if(!Auth::user()->hasRole(['manager','teacher']))
                      <div class="col-xs-6"> 
                        <form action="{{ route('friends.leave', ['userId' => $user->id]) }}" method="POST">
                            <button type="submit" name="" class="btn btn-danger btn-block"><i class="fa fa-close"></i> Leave Institute</button>
                            {{csrf_field()}} 
                        </form>
                      </div>
                      <div class="col-xs-6">
                          <a href="#" class="btn btn-azure btn-block"><i class="fa fa-envelope"></i> Message</a>
                      </div>
                    @endif                      
                  @else
                      @if(Auth::user()->id !== $user->id && !Auth::user()->hasRole(['manager','teacher']))
                      <div class="col-xs-12">
                        <a href="{{ route('friends.join',['userId' => $user->id]) }}" class="btn btn-primary btn-block"><i class="fa fa-user"></i>Join Institute</a>
                        </div>
                      @endif
                  @endif
                </div>
              </div>
              <div class="section">
                  <h3>Contact Info</h3>
                  <p><i class="fa fa-map-marker"></i> Address :{{ $user->address }}</p>
                  <p><i class="fa fa-envelope"></i> Email : {{ $user->email }}</p>
                  <p><i class="fa fa-phone"></i> Phone :{{ $user->phone }}</p>
              </div>
              <div class="section">
                <h3>Statistics</h3>
                <p><span class="badge">332</span> Following</p>
                <p><span class="badge">124</span> Followers</p>
                <p><span class="badge">620</span> Likes</p>
              </div>
              <div class="section">
                <h3>Social</h3>
                <ul class="list-unstyled list-social">
                  <li><a href="#"><i class="fa fa-twitter"></i> @jhongrwo</a></li>
                  <li><a href="#"><i class="fa fa-facebook"></i> John grow</a></li>
                  <li><a href="#"><i class="fa fa-dribbble"></i> johninizzie</a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i> John grow</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-8">
              <div class="profile-info-right">
                  <ul class="nav nav-pills nav-pills-custom-minimal custom-minimal-bottom">
                      <li class="active"><a href="#timeline" data-toggle="tab">Timeline</a></li>
                      <li><a href="#followers" data-toggle="tab">Teachers</a></li>
                      <li><a href="#following" data-toggle="tab">Requests</a></li>
                  </ul>
                  <div class="tab-content">
                      <!-- activities -->
                      <div class="tab-pane fade in active" id="timeline">
                          <div class="box profile-info n-border-top">
                             <form role="form" action="{{route('posts.store')}}" method="POST">
                              {{csrf_field()}} 
                                <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Whats in your mind today?" name="body"></textarea>
                            
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
                              </div>

                              <div class="box-body" style="display: block;">
                                
                                {!! $post->body !!}
  
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
                      <!-- end activities -->
                      <!-- followers -->
                      <div class="tab-pane fade" id="followers">
                           @if(!$user->friends()->count())
                            <p>has no teachers</p>
                    @else

                          @foreach($user->friends() as $friend)
                            @if($friend->hasRole('teacher'))
                               <div class="media user-follower">
                                <img src="{{asset('images/users/'. $friend->getAvatar())}}" alt="User Image" class="media-object pull-left">
                                <div class="media-body">
                                  <a href="#">{{ $friend->name }}<br><span class="text-muted username">@mrantonius</span></a>
                                  
                                   @if(Auth::user()->hasRole('student') && !Auth::user()->isFriendWith($friend))
                                        @if(Auth::user()->hasFriendRequestPending($friend))
                                            <p>You have sent a join request.</p>
                                        @else
                                            <a href="{{ route('friends.join',['userId' => $friend->id]) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> <span>Add Teacher</span></a>
                                        @endif
                                    @else

                                    @endif
                                </div>
                              </div>
                              @endif
                          @endforeach
                      @endif
                      </div>
                      <!-- end followers -->
                      <!-- following -->
                      <div class="tab-pane fade" id="following">
                          @if(!$requests->count())
                            <p>You have no join requests.</p>
                          @else
                            @foreach($requests as $user)
                            <div class="media user-following">
                              <img src="{{asset('images/users/'. $user->getAvatar())}}" alt="User Avatar" class="media-object pull-left">
                              <div class="media-body">
                                  <a href="{{ route('profile',['id' => $user->id]) }}">{{ $user->name }}<br><span class="text-muted username">@stella</span></a>
                                  <a href="{{ route('friends.accept',['userId' => $user->id]) }}" class="btn btn-sm btn-danger pull-right">
                                            <i class="fa fa-user"></i>
                                            Accept Join Request
                                          </a>
                              </div>
                          </div> 
                            @endforeach
                        @endif
                      </div>    
                      <!-- end following -->
                  </div>
              </div>
          </div>
        </div>
      </div>
      </div>
      </div>

      

    <!-- Modal -->
    <div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>
          <div class="modal-body text-centers">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
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