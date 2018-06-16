@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('style') 
  <link href="{{ asset('/assets/css/profile4.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Begin page content -->
    <div class="container page-content">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="row">
            <div class="col-md-12">
              <div class="bg-picture" style="background-image:url('img/Cover/cover.jpg')">
                <span class="bg-picture-overlay"></span><!-- overlay -->
                <!-- meta -->
                <div class="box-layout meta bottom">
                  <div class="col-md-6 clearfix">
                    <span class="img-wrapper pull-left m-r-15">
                      <img src="img/Friends/guy-3.jpg" alt="" style="width:64px" class="br-radius">
                    </span>
                    <div class="media-body">
                      <h3 class="text-white mb-2 m-t-10 ellipsis">{{ $class->name }}</h3>
                      <h5 class="text-white"> @username</h5>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="pull-right">
                      <div class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle btn btn-azure" href="#" aria-expanded="false"> Following <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li><a href="#">Poke</a></li>
                            <li><a href="#">Private message</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Unfollow</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div><!--/ meta -->
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Nav tabs -->
            <ul class="nav nav-pills nav-pills-custom-minimal custom-minimal-bottom profile-tabs">
              <li role="presentation" class="active"><a href="#timeline" aria-controls="timeline" role="tab" data-toggle="tab">Timeline</a></li>
              <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">About</a></li>
              <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Friends</a></li>
              <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Photos</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <!-- Timeline -->
              <div role="tabpanel" class="tab-pane active" id="timeline">
                <div class="row">
                  <div class="col-md-5">
                    <div class="widget">
                      <div class="widget-header">
                        <h3 class="widget-caption">About</h3>
                      </div>
                      <div class="widget-body bordered-top bordered-sky">
                        <ul class="list-unstyled profile-about margin-none">
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Date of Birth</span></div>
                              <div class="col-sm-8">12 January 1990</div>
                            </div>
                          </li>
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Job</span></div>
                              <div class="col-sm-8">Ninja developer</div>
                            </div>
                          </li>
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Gender</span></div>
                              <div class="col-sm-8">Male</div>
                            </div>
                          </li>
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Lives in</span></div>
                              <div class="col-sm-8">Miami, FL, USA</div>
                            </div>
                          </li>
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Credits</span></div>
                              <div class="col-sm-8">249</div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="widget">
                      <div class="widget-header">
                        <h3 class="widget-caption">About</h3>
                      </div>
                      <div class="widget-body bordered-top bordered-sky">
                         <ul class="list-group">
                          <li class="list-group-item">
                            <script async type="text/javascript" src="../../cdn.carbonads.com/carboned55.js?zoneid=1673&amp;serve=C6AILKT&amp;placement=bootdeycom" id="_carbonads_js"></script>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="widget widget-friends">
                      <div class="widget-header">
                        <h3 class="widget-caption">Friends</h3>
                      </div>
                      <div class="widget-body bordered-top  bordered-sky">
                        <div class="row">
                          <div class="col-md-12">
                            <ul class="img-grid" style="margin: 0 auto;">
                              <li>
                                <a href="#">
                                  <img src="img/Friends/guy-6.jpg" alt="image">
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="img/Friends/woman-3.jpg" alt="image">
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="img/Friends/guy-2.jpg" alt="image">
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="img/Friends/guy-9.jpg" alt="image">
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="img/Friends/woman-9.jpg" alt="image">
                                </a>
                              </li>
                              <li class="clearfix">
                                <a href="#">
                                  <img src="img/Friends/guy-4.jpg" alt="image">
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="img/Friends/guy-1.jpg" alt="image">
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="img/Friends/woman-4.jpg" alt="image">
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="img/Friends/guy-6.jpg" alt="image">
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="widget">
                      <div class="widget-header">
                        <h3 class="widget-caption">Groups</h3>
                      </div>
                      <div class="widget-body bordered-top bordered-sky">
                        <div class="card">
                          <div class="content">
                            <ul class="list-unstyled team-members">
                              <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="img/Likes/likes-1.png" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                       Github
                                    </div>
                        
                                    <div class="col-xs-3 text-right">
                                        <btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user"></i></btn>
                                    </div>
                                </div>
                              </li>
                              <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="img/Likes/likes-3.png" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        Css snippets
                                    </div>
                        
                                    <div class="col-xs-3 text-right">
                                        <btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user"></i></btn>
                                    </div>
                                </div>
                              </li>
                              <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="img/Likes/likes-2.png" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        Html Action
                                    </div>
                        
                                    <div class="col-xs-3 text-right">
                                        <btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user"></i></btn>
                                    </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>  
                      </div>
                    </div>
                  </div>

                  <!--============= timeline posts-->
                  <div class="col-md-7">
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
                                  <input type="hidden" name="post_type" value="App\Cls">
                                  <input type="hidden" name="class_id" value="{{ $class->id }}">
                              
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
                                  <img class="img-circle" src="{{ asset('/images/teachers/default.jpg') }}" alt="User Image">
                                  <span class="username"><a href="{{ route('profile',['id' => $post->user->id]) }}">{{ $post->user->name }}</a></span>
                                  <span class="description">Shared publicly - {{ $post->created_at->diffForHumans() }}</span>
                                </div>

                                @if($post->user->id == Auth::user()->id || $class->user->id == Auth::user()->id)

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
                                
                                {!! $post->body !!}

                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                                <a href="{{route('posts.like',['postId' => $post->id])}}" type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</a>
                                <span class="pull-right text-muted">0 likes - 0 comments</span>
                              </div>
                              <div class="box-footer box-comments" style="display: block;">
                              @foreach($post->replies as $reply)
                                <div class="box-comment">
                                  <img class="img-circle img-sm" src="{{ asset('/images/teachers/default.jpg') }}" alt="User Image">
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
                                  <img class="img-responsive img-circle img-sm" src="{{ asset('/images/teachers/default.jpg') }}" alt="Alt Text">
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
                  </div><!-- end timeline posts-->
                </div>
              </div><!-- end timeline -->
              <!-- about -->
              <div role="tabpanel" class="tab-pane" id="profile">
                <div class="row container-contact">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-4 col-md-5 col-xs-12">
                        <div class="row">
                          <div class="col-xs-3">
                            Email:
                          </div>
                          <div class="col-xs-9">
                            example@yourdomain.com
                          </div>
                          <div class="col-xs-3">
                            Phone:
                          </div>
                          <div class="col-xs-9">
                            +1-800-600-9898
                          </div>
                          <div class="col-xs-3">
                            Address:
                          </div>
                          <div class="col-xs-9">
                            Sacramento, CA
                          </div>
                          <div class="col-xs-3">
                            Birthday:
                          </div>
                          <div class="col-xs-9">
                            1975/8/17
                          </div>
                          <div class="col-xs-3">
                            URL:
                          </div>
                          <div class="col-xs-9">
                            http://yourdomain.com
                          </div>
                          <div class="col-xs-3">
                           Job:
                          </div>
                          <div class="col-xs-9">
                            Ninja developer
                          </div>
                          <div class="col-xs-3">
                           Lives in:
                          </div>
                          <div class="col-xs-9">
                            Miami, FL, USA
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-8 col-md-7 col-xs-12">
                        <p class="contact-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- end about -->
              <!-- friends -->
              <div role="tabpanel" class="tab-pane" id="messages">
                <div class="row">
                  <div class="col-md-3">
                    <div class="contact-box center-version">
                      <a href="#">
                        <img alt="image" class="img-circle" src="img/Friends/woman-1.jpg">
                        <h3 class="m-b-xs"><strong>John Doe</strong></h3>
          
                        <div class="font-bold">Graphics designer</div>
                      </a>
                      <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                          <a href="messages1.html" class="btn btn-xs btn-white"><i class="fa fa-envelope"></i>Send Messages</a>
                          <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="contact-box center-version">
                      <a href="#">
                        <img alt="image" class="img-circle" src="img/Friends/woman-2.jpg">
                        <h3 class="m-b-xs"><strong>John Doe</strong></h3>
          
                        <div class="font-bold">Graphics designer</div>
                      </a>
                      <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                          <a href="messages1.html" class="btn btn-xs btn-white"><i class="fa fa-envelope"></i>Send Messages</a>
                          <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="contact-box center-version">
                      <a href="#">
                        <img alt="image" class="img-circle" src="img/Friends/woman-3.jpg">
                        <h3 class="m-b-xs"><strong>John Doe</strong></h3>
          
                        <div class="font-bold">Graphics designer</div>
                      </a>
                      <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                          <a href="messages1.html" class="btn btn-xs btn-white"><i class="fa fa-envelope"></i>Send Messages</a>
                          <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="contact-box center-version">
                      <a href="#">
                        <img alt="image" class="img-circle" src="img/Friends/guy-1.jpg">
                        <h3 class="m-b-xs"><strong>John Doe</strong></h3>
          
                        <div class="font-bold">Graphics designer</div>
                      </a>
                      <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                          <a href="messages1.html" class="btn btn-xs btn-white"><i class="fa fa-envelope"></i>Send Messages</a>
                          <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="contact-box center-version">
                      <a href="#">
                        <img alt="image" class="img-circle" src="img/Friends/guy-2.jpg">
                        <h3 class="m-b-xs"><strong>John Doe</strong></h3>
          
                        <div class="font-bold">Graphics designer</div>
                      </a>
                      <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                          <a href="messages1.html" class="btn btn-xs btn-white"><i class="fa fa-envelope"></i>Send Messages</a>
                          <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="contact-box center-version">
                      <a href="#">
                        <img alt="image" class="img-circle" src="img/Friends/guy-3.jpg">
                        <h3 class="m-b-xs"><strong>John Doe</strong></h3>
          
                        <div class="font-bold">Graphics designer</div>
                      </a>
                      <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                          <a href="messages1.html" class="btn btn-xs btn-white"><i class="fa fa-envelope"></i>Send Messages</a>
                          <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="contact-box center-version">
                      <a href="#">
                        <img alt="image" class="img-circle" src="img/Friends/guy-5.jpg">
                        <h3 class="m-b-xs"><strong>John Doe</strong></h3>
          
                        <div class="font-bold">Graphics designer</div>
                      </a>
                      <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                          <a href="messages1.html" class="btn btn-xs btn-white"><i class="fa fa-envelope"></i>Send Messages</a>
                          <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="contact-box center-version">
                      <a href="#">
                        <img alt="image" class="img-circle" src="img/Friends/woman-4.jpg">
                        <h3 class="m-b-xs"><strong>John Doe</strong></h3>
          
                        <div class="font-bold">Graphics designer</div>
                      </a>
                      <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                          <a href="messages1.html" class="btn btn-xs btn-white"><i class="fa fa-envelope"></i>Send Messages</a>
                          <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  
              </div><!-- end friends -->
              <!-- photos -->
              <div role="tabpanel" class="tab-pane" id="settings">
                <div class="row">
                  <div class="col-md-12">
                    <ul class="gallery-list">
                      <li>
                        <div class="image-container">
                          <div class="image">
                              <img src="img/Photos/1.jpg" alt="">
                          </div>
                          <div class="btn-list">
                            <a href="view_photo.html" class="btn btn-white btn-xs"><i class="fa fa-search-plus"></i></a>
                          </div>
                          <div class="info">
                            <h5>Quisque a eleifend est, quis accumsan metus.</h5>
                            <small class="text-muted">24/08/2015</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="image-container">
                          <div class="image">
                              <img src="img/Photos/2.jpg" alt="">
                          </div>
                          <div class="btn-list">
                            <a href="view_photo.html" class="btn btn-white btn-xs"><i class="fa fa-search-plus"></i></a>
                          </div>
                          <div class="info">
                            <h5>Quisque a eleifend est, quis accumsan metus.</h5>
                            <small class="text-muted">24/08/2015</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="image-container">
                          <div class="image">
                              <img src="img/Photos/3.jpg" alt="">
                          </div>
                          <div class="btn-list">
                            <a href="view_photo.html" class="btn btn-white btn-xs"><i class="fa fa-search-plus"></i></a>
                          </div>
                          <div class="info">
                            <h5>Quisque a eleifend est, quis accumsan metus.</h5>
                            <small class="text-muted">24/08/2015</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="image-container">
                          <div class="image">
                              <img src="img/Photos/4.jpg" alt="">
                          </div>
                          <div class="btn-list">
                            <a href="view_photo.html" class="btn btn-white btn-xs"><i class="fa fa-search-plus"></i></a>
                          </div>
                          <div class="info">
                            <h5>Quisque a eleifend est, quis accumsan metus.</h5>
                            <small class="text-muted">24/08/2015</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="image-container">
                          <div class="image">
                              <img src="img/Photos/5.jpg" alt="">
                          </div>
                          <div class="btn-list">
                            <a href="view_photo.html" class="btn btn-white btn-xs"><i class="fa fa-search-plus"></i></a>
                          </div>
                          <div class="info">
                            <h5>Quisque a eleifend est, quis accumsan metus.</h5>
                            <small class="text-muted">24/08/2015</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="image-container">
                          <div class="image">
                              <img src="img/Photos/6.jpg" alt="">
                          </div>
                          <div class="btn-list">
                            <a href="view_photo.html" class="btn btn-white btn-xs"><i class="fa fa-search-plus"></i></a>
                          </div>
                          <div class="info">
                            <h5>Quisque a eleifend est, quis accumsan metus.</h5>
                            <small class="text-muted">24/08/2015</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="image-container">
                          <div class="image">
                              <img src="img/Photos/7.jpg" alt="">
                          </div>
                          <div class="btn-list">
                            <a href="view_photo.html" class="btn btn-white btn-xs"><i class="fa fa-search-plus"></i></a>
                          </div>
                          <div class="info">
                            <h5>Quisque a eleifend est, quis accumsan metus.</h5>
                            <small class="text-muted">24/08/2015</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="image-container">
                          <div class="image">
                              <img src="img/Photos/8.jpg" alt="">
                          </div>
                          <div class="btn-list">
                            <a href="view_photo.html" class="btn btn-white btn-xs"><i class="fa fa-search-plus"></i></a>
                          </div>
                          <div class="info">
                            <h5>Quisque a eleifend est, quis accumsan metus.</h5>
                            <small class="text-muted">24/08/2015</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="image-container">
                          <div class="image">
                              <img src="img/Photos/9.jpg" alt="">
                          </div>
                          <div class="btn-list">
                            <a href="view_photo.html" class="btn btn-white btn-xs"><i class="fa fa-search-plus"></i></a>
                          </div>
                          <div class="info">
                            <h5>Quisque a eleifend est, quis accumsan metus.</h5>
                            <small class="text-muted">24/08/2015</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="image-container">
                          <div class="image">
                              <img src="img/Photos/1.jpg" alt="">
                          </div>
                          <div class="btn-list">
                            <a href="view_photo.html" class="btn btn-white btn-xs"><i class="fa fa-search-plus"></i></a>
                          </div>
                          <div class="info">
                            <h5>Quisque a eleifend est, quis accumsan metus.</h5>
                            <small class="text-muted">24/08/2015</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="image-container">
                          <div class="image">
                              <img src="img/Photos/2.jpg" alt="">
                          </div>
                          <div class="btn-list">
                            <a href="view_photo.html" class="btn btn-white btn-xs"><i class="fa fa-search-plus"></i></a>
                          </div>
                          <div class="info">
                            <h5>Quisque a eleifend est, quis accumsan metus.</h5>
                            <small class="text-muted">24/08/2015</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="image-container">
                          <div class="image">
                              <img src="img/Photos/3.jpg" alt="">
                          </div>
                          <div class="btn-list">
                            <a href="view_photo.html" class="btn btn-white btn-xs"><i class="fa fa-search-plus"></i></a>
                          </div>
                          <div class="info">
                            <h5>Quisque a eleifend est, quis accumsan metus.</h5>
                            <small class="text-muted">24/08/2015</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="image-container">
                          <div class="image">
                              <img src="img/Photos/4.jpg" alt="">
                          </div>
                          <div class="btn-list">
                            <a href="view_photo.html" class="btn btn-white btn-xs"><i class="fa fa-search-plus"></i></a>
                          </div>
                          <div class="info">
                            <h5>Quisque a eleifend est, quis accumsan metus.</h5>
                            <small class="text-muted">24/08/2015</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="image-container">
                          <div class="image">
                              <img src="img/Photos/5.jpg" alt="">
                          </div>
                          <div class="btn-list">
                            <a href="view_photo.html" class="btn btn-white btn-xs"><i class="fa fa-search-plus"></i></a>
                          </div>
                          <div class="info">
                            <h5>Quisque a eleifend est, quis accumsan metus.</h5>
                            <small class="text-muted">24/08/2015</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="image-container">
                          <div class="image">
                              <img src="img/Photos/6.jpg" alt="">
                          </div>
                          <div class="btn-list">
                            <a href="view_photo.html" class="btn btn-white btn-xs"><i class="fa fa-search-plus"></i></a>
                          </div>
                          <div class="info">
                            <h5>Quisque a eleifend est, quis accumsan metus.</h5>
                            <small class="text-muted">24/08/2015</small>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div><!-- end photos -->
            </div>
          </div>  
        </div>
      </div>
    </div>
@endsection

@section('script') 
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