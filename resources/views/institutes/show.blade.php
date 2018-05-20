@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('style') 
  <!-- bootstrap datepicker -->
  <link href="{{ asset('/assets/css/profile2.css') }}" rel="stylesheet">
@endsection

@section('script') 
  <!-- bootstrap datepicker -->
  <script src="{{ asset('/assets/js/custom.js') }}"></script>
@endsection

@section('content')
    <!-- Begin page content -->
    <div class="container page-content">
      <div class="row" id="user-profile">
        <div class="col-md-4 col-xs-12">
          <div class="row-xs">
            <div class="main-box clearfix">
              <h2>{{ $user->name }}</h2>
              <div class="profile-status">
                <i class="fa fa-check-circle"></i> Online
              </div>
              @if(Auth::user()->avatar != null)
                <img src="{{asset('images/users/'. Auth::user()->avatar)}}" alt="User profile picture" class="profile-img img-responsive center-block show-in-modal">
              @else
                <img src="{{ asset('images/institutes/default.png')}}" alt="User profile picture" class="profile-img img-responsive center-block show-in-modal">
              @endif
              
              <div class="profile-details">
                <ul class="fa-ul">
                  <li><i class="fa-li fa fa-user"></i>Following: <span>456</span></li>
                  <li><i class="fa-li fa fa-users"></i>Followers: <span>828</span></li>
                  <li><i class="fa-li fa fa-comments"></i>Posts: <span>1024</span></li>
                </ul>
              </div>

              @if(Auth::user()->hasRole('student'))

               {{--  @if($user->students->contains('user_id',Auth::user()->id))
                     <form action="{{route('institutes.leave', $user->id)}}" method="POST">
                    {{csrf_field()}} 
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-close"></i> Leave Institute
                    </button>
                </form> 
                @else

                 <form action="{{route('institutes.join', $user->id)}}" method="POST">
                    {{csrf_field()}} 
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Join Institute
                    </button>
                </form> 

                @endif --}}
              
              @endif
              
              <div class="profile-message-btn center-block text-center">
                <a href="#" class="btn btn-azure">
                  <i class="fa fa-envelope"></i>
                  Send message
                </a>
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
                      @if(!Auth::user()->hasRole(['manager','teacher']))  
                        <form action="{{ route('friends.leave', ['userId' => $user->id]) }}" method="POST">
                            <input type="submit" name="" class="btn btn-danger" value="Leave Institute">
                            {{csrf_field()}} 
                        </form>
                      @endif
                  @else
                      @if(Auth::user()->id !== $user->id && !Auth::user()->hasRole(['manager','teacher']))
                        <a href="{{ route('friends.join',['userId' => $user->id]) }}" class="btn btn-primary"><i class="fa fa-user"></i>Join Institute</a>
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
                    <div class="profile-user-details-label">
                      First Name
                    </div>
                    <div class="profile-user-details-value">
                      John
                    </div>
                  </div>
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Last Name
                    </div>
                    <div class="profile-user-details-value">
                      Breakgrow
                    </div>
                  </div>
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Address
                    </div>
                    <div class="profile-user-details-value">
                      10880 Malibu Point,<br> 
                      Malibu, Calif., 90265
                    </div>
                  </div>
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Email
                    </div>
                    <div class="profile-user-details-value">
                      BreakgrowJohn@myemail.com
                    </div>
                  </div>
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Phone number
                    </div>
                    <div class="profile-user-details-value">
                      011 223 344 556 677
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
                  <li><a href="#tab-following" data-toggle="tab">Teachers</a></li>
                  <li><a href="#tab-requests" data-toggle="tab">Requests</a></li>
                </ul>
                
                <div class="tab-content">
                  <div class="tab-pane fade in active" id="tab-timeline">
                    <div class="row">
                      <div class="col-md-12">
                        <!--   posts -->
                         @if(!$posts->count())
                      <p>There's nothing on yout timeline, yet.</p>
                      @else
                      @foreach($posts as $post)
                          <div class="box box-widget">
                              <div class="box-header with-border">
                                <div class="user-block">
                                    @if($post->user->avatar != null)
                                      <img class="img-circle" src="{{asset('images/users/'. $post->user->avatar)}}" alt="User Image">
                                    @else
                                       <img class="img-circle" src="{{ asset('/images/users/default.png') }}" alt="User Image">
                                    @endif
                                    <span class="username"><a href="#">{{ $post->user->name }}</a></span>
                                    <span class="description">Shared publicly - {{ $post->created_at->diffForHumans() }}</span>
                                </div>
                              </div>

                              <div class="box-body" style="display: block;">
                                
                                <p>{{ $post->body }}</p>
  
                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                                <a href="{{route('posts.like',['postId' => $post->id])}}" type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</a>
                                <span class="pull-right text-muted">127 likes - {{ $post->replies()->count()}} comments</span>
                              </div>
                              <div class="box-footer box-comments" style="display: block;">
                              @foreach($post->replies as $reply)
                                <div class="box-comment">
                                  @if($reply->user->avatar != null)
                                    <img class="img-circle img-sm" src="{{asset('images/users/'. $reply->user->avatar)}}" alt="User Image">
                                  @else
                                     <img class="img-circle img-sm" src="{{ asset('/images/users/default.png') }}" alt="User Image">
                                  @endif
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
                                  @if(Auth::user()->avatar != null)
                                    <img class="img-responsive img-circle img-sm" src="{{asset('images/users/'. Auth::user()->avatar)}}" alt="User Image">
                                  @else
                                     <img class="img-responsive img-circle img-sm" src="{{ asset('/images/teachers/default.jpg') }}" alt="User Image">
                                  @endif
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
                    @if(!$user->friends()->count())
                            <p>has no teachers</p>
                    @else

                          @foreach($user->friends() as $friend)
                            @if($friend->hasRole('teacher'))
                              <li class="col-md-6">
                                <div class="img">
                                  @if($friend->avatar != null)
                                    <img src="{{asset('images/users/'. $friend->avatar)}}" alt="User Image">
                                  @else
                                    <img src="{{ asset('/images/teachers/default.jpg') }}" alt="User Image">
                                  @endif
                                </div>
                                <div class="details">
                                  <div class="name">
                                    <a href="{{ route('profile',['id' => $friend->id]) }}">{{ $friend->name }}</a>
                                  </div>
                                  <div class="type">
                                    @if(Auth::user()->hasRole('student') && !Auth::user()->isFriendWith($friend))
                                        @if(Auth::user()->hasFriendRequestPending($friend))
                                            <p>You have sent a join request.</p>
                                        @else
                                            <a href="{{ route('friends.join',['userId' => $friend->id]) }}" class="btn btn-warning">
                                              <i class="fa fa-plus"></i>
                                              Add Teacher
                                            </a>
                                        @endif
                                    @else

                                    @endif
                                  </div>
                                </div>
                              </li>
                              @endif
                          @endforeach
                      @endif
                    </ul>
                    <br>
                    <a href="#" class="btn btn-azure pull-right">
                      <i class="fa fa-refresh"></i>
                      Load more
                    </a>
                  </div>
                  
                  <div class="tab-pane fade" id="tab-requests">
                    <ul class="widget-users row">
                      @if(!$requests->count())
                        <p>You have no join requests.</p>
                      @else
                        @foreach($requests as $user)
                            <li class="col-md-6">
                              <div class="img">
                                @if($user->avatar != null)
                                  <img src="{{asset('images/users/'. $user->avatar)}}" alt="User Image">
                                @else
                                  <img src="{{ asset('/images/users/default.png') }}" alt="User Image">
                                @endif
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