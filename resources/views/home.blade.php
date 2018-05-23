@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('script') 
  <!-- TinyMCE -->
  <script src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
  <script>
    tinymce.init({ 
      selector:'textarea',
      plugins: "code",
    });</script>
@endsection


@section('content')
      <div class="row">
        <!-- left links -->
        <div class="col-md-3">
          <div class="profile-nav">
            <div class="widget">
              <div class="widget-body">
                <div class="user-heading round">
                  <a href="#">
                    @if(Auth::user()->avatar != null)
                      <img src="{{asset('images/users/'. Auth::user()->avatar)}}" alt="User profile picture">
                    @else
                      <img src="{{ asset('images/users/default.png')}}" alt="User profile picture">
                    @endif
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
                      <span class="label label-info pull-right r-activity">9</span>
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
                      <span class="label label-info pull-right r-activity">{{ Auth::user()->notebooks()->count() }}</span>
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
                  <li><a href="/profile/classes"> <i class="fa fa-globe"></i> Classes</a></li>
                  <li><a href="#"> <i class="fa fa-gamepad"></i> Games</a></li>
                  <li><a href="#"> <i class="fa fa-puzzle-piece"></i> Ads</a></li>
                  <li><a href="#"> <i class="fa fa-home"></i> Markerplace</a></li>
                  <li><a href="#"> <i class="fa fa-users"></i> Groups</a></li>
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
                                 
                                  <span class="username"><a href="{{ route('profile',['id' => $post->user->id]) }}">{{ $post->user->name }}</a></span>
                                  <span class="description">Shared publicly - {{ $post->created_at->diffForHumans() }}</span>
                                </div>
                              </div>

                              <div class="box-body" style="display: block;">
                                
                                <p>{!! $post->body !!}</p>

                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                                <a href="{{route('posts.like',['postId' => $post->id])}}" type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</a>
                                <span class="pull-right text-muted">127 likes - 3 comments</span>
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
                   <ul class="list-unstyled team-members">
                   @forelse (Auth::user()->notifications as $notification)
                                     <li>
                                      <div class="row">
                                        <div class="col-xs-3">
                                          <div class="avatar">
                                              @if($notification->data['user']['avatar'] != null)
                                                <img src="{{asset('images/users/'. $notification->data['user']['avatar'])}}" alt="img" class="img-circle img-no-padding img-responsive">
                                              @else
                                                <img src="{{ asset('images/users/default.png')}}" alt="img" class="img-circle img-no-padding img-responsive">
                                              @endif  
                                          </div>
                                        </div>
                                        @if($notification->type == "App\Notifications\RepliedToPost")
                                        <div class="col-xs-9">
                                          <b><a href="{{ route('profile',['id' => $notification->data['user']['id']]) }}">{{ $notification->data['user']['name']}}</a></b> commented on your post 
                                          <b><a href="{{ route('posts.show',['id' => $notification->data['post']['id']]) }}">{{ substr(strip_tags($notification->data['post']['body']),0,50) }}</a></b> 
                                          <span class="timeago" > {{ $notification->created_at->diffForHumans() }}</span>
                                        </div>
                                        @else
                                        <div class="col-xs-9">
                                          <b><a href="{{ route('profile',['id' => $notification->data['user']['id']]) }}">{{ $notification->data['user']['name']}}</a></b> add New Assignment 
                                          <b><a href="{{ route('assignments.show',['id' => $notification->data['assignment']['id']]) }}">{{ $notification->data['assignment']['title'] }}</a></b>  on Class <b><a href="{{ route('classes.show',['id' => $notification->data['class']['id']]) }}">{{ $notification->data['class']['name'] }}</a></b> 
                                          <span class="timeago" > {{ $notification->created_at->diffForHumans() }}</span>
                                        </div>
                                        @endif
                                      </div>
                                    </li>
                                    
                                @empty
                                    <li><a href="#">No unread Notifications</a></li>
                                @endforelse
                  </ul>         
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
@endsection