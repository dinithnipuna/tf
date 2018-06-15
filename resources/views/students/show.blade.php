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
                <i class="fa fa-check-circle"></i> Online
              </div>
              <img src="{{asset('images/users/'. $user->getAvatar())}}" alt="User profile picture" class="profile-img img-responsive center-block show-in-modal">

              <div class="profile-details">
                <ul class="fa-ul">
                  <li><i class="fa-li fa fa-user"></i>Institutes: <span>456</span></li>
                  <li><i class="fa-li fa fa-users"></i>Teachers: <span>{{ $user->friends()->count() }}</span></li>
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
                      <a href="{{ route('friends.accept',['userId' => $user->id]) }}" class="btn btn-primary"><i class="fa fa-user"></i>Accept Join Request</a>
                  @endif
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
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Last Name
                    </div>
                    <div class="profile-user-details-value">
                      {{ $names[1] }}
                    </div>
                  </div>
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
                  <li><a href="#tab-institutes" data-toggle="tab">Institutes</a></li>
                  <li><a href="#tab-teachers" data-toggle="tab">Teachers</a></li>
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
                    </div>
                  </div>
                  
                  <div class="tab-pane fade" id="tab-institutes">
                    <ul class="widget-users row">
                        @if(!$user->friends()->count())
                            <p>has no teachers</p>
                        @else
                            @foreach($user->friends() as $friend)
                                @if($friend->hasRole('manager'))
                                    <li class="col-md-6">
                                      <div class="img">
                                      <img src="{{asset('images/users/'. $friend->getAvatar())}}" alt="User Image">
                                      </div>
                                      <div class="details">
                                        <div class="name">
                                          <a href="{{ route('profile',['id' => $friend->id]) }}">{{ $friend->name }}</a>
                                        </div>
                                        <div class="time">
                                          <i class="fa fa-clock-o"></i> Last online: 5 minutes ago
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
                  
                  <div class="tab-pane fade" id="tab-teachers">
                    <ul class="widget-users row">
                      @if(!$user->friends()->count())
                            <p>has no teachers</p>
                      @else
                          @foreach($user->friends() as $friend)
                              @if($friend->hasRole('teacher'))
                                  <li class="col-md-6">
                                    <div class="img">
                                    <img src="{{asset('images/users/'. $friend->getAvatar())}}" alt="User Image">
                                    </div>
                                    <div class="details">
                                      <div class="name">
                                        <a href="{{ route('profile',['id' => $friend->id]) }}">{{ $friend->name }}</a>
                                      </div>
                                      <div class="time">
                                        <i class="fa fa-clock-o"></i> Last online: 5 minutes ago
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
@endsection

@section('script') 
<script>
    $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
  
    $(function() {
      $("#messageForm").submit(function( event ) {
        event.preventDefault();

        $.post('{{ route('messages.update',$user->id) }}', $.param($(this).serializeArray()), function(data) {
              $('#modalShow').modal('hide');     
        });
      });
    });
</script>
@endsection