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
      <div class="row" id="user-profile">
        <div class="col-md-4 col-xs-12">
          <div class="row-xs">
            <div class="main-box clearfix">
              <h2>{{ $institute->name }}</h2>
              <div class="profile-status">
                <i class="fa fa-check-circle"></i> Online
              </div>
              <img src="img/Friends/guy-3.jpg" alt="" class="profile-img img-responsive center-block show-in-modal">
              
              <div class="profile-details">
                <ul class="fa-ul">
                  <li><i class="fa-li fa fa-user"></i>Following: <span>456</span></li>
                  <li><i class="fa-li fa fa-users"></i>Followers: <span>828</span></li>
                  <li><i class="fa-li fa fa-comments"></i>Posts: <span>1024</span></li>
                </ul>
              </div>
              
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
                  <li><a href="#tab-followers" data-toggle="tab">Followers</a></li>
                </ul>
                
                <div class="tab-content">
                  <div class="tab-pane fade in active" id="tab-timeline">
                    <div class="row">
                      <div class="col-md-12">
                        <!--   posts -->
                        <div class="box box-widget">
                          <div class="box-header with-border">
                            <div class="user-block">
                              <img class="img-circle" src="img/Friends/guy-3.jpg" alt="User Image">
                              <span class="username"><a href="#">John Breakgrow jr.</a></span>
                              <span class="description">Shared publicly - 7:30 PM Today</span>
                            </div>
                          </div>

                          <div class="box-body" style="display: block;">
                            <img class="img-responsive show-in-modal" src="img/Post/young-couple-in-love.jpg" alt="Photo">
                            <p>I took this photo this morning. What do you guys think?</p>
                            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                            <span class="pull-right text-muted">127 likes - 3 comments</span>
                          </div>
                          <div class="box-footer box-comments" style="display: block;">
                            <div class="box-comment">
                              <img class="img-circle img-sm" src="img/Friends/guy-2.jpg" alt="User Image">
                              <div class="comment-text">
                                <span class="username">
                                Maria Gonzales
                                <span class="text-muted pull-right">8:03 PM Today</span>
                                </span>
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                              </div>
                            </div>

                            <div class="box-comment">
                              <img class="img-circle img-sm" src="img/Friends/guy-3.jpg" alt="User Image">
                              <div class="comment-text">
                                <span class="username">
                                Luna Stark
                                <span class="text-muted pull-right">8:03 PM Today</span>
                                </span>
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                              </div>
                            </div>
                          </div>
                          <div class="box-footer" style="display: block;">
                            <form action="#" method="post">
                              <img class="img-responsive img-circle img-sm" src="img/Friends/guy-3.jpg" alt="Alt Text">
                              <div class="img-push">
                                <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                              </div>
                            </form>
                          </div>
                        </div><!--  end posts-->



                        <!-- post -->
                        <div class="box box-widget">
                          <div class="box-header with-border">
                            <div class="user-block">
                              <img class="img-circle" src="img/Friends/guy-3.jpg" alt="User Image">
                              <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                              <span class="description">Shared publicly - 7:30 PM Today</span>
                            </div>
                          </div>
                          <div class="box-body">
                            <p>Far far away, behind the word mountains, far from the
                            countries Vokalia and Consonantia, there live the blind
                            texts. Separated they live in Bookmarksgrove right at</p>

                            <p>the coast of the Semantics, a large language ocean.
                            A small river named Duden flows by their place and supplies
                            it with the necessary regelialia. It is a paradisematic
                            country, in which roasted parts of sentences fly into
                            your mouth.</p>

                            <div class="attachment-block clearfix">
                              <img class="attachment-img show-in-modal" src="img/Photos/2.jpg" alt="Attachment Image">
                              <div class="attachment-pushed">
                              <h4 class="attachment-heading"><a href="http://www.bootdey.com/">Lorem ipsum text generator</a></h4>
                              <div class="attachment-text">
                              Description about the attachment can be placed here.
                              Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
                              </div>
                              </div>
                            </div>
                            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                            <span class="pull-right text-muted">45 likes - 2 comments</span>
                          </div>
                          <div class="box-footer box-comments">
                            <div class="box-comment">
                              <img class="img-circle img-sm" src="img/Friends/guy-5.jpg" alt="User Image">
                              <div class="comment-text">
                                <span class="username">
                                Maria Gonzales
                                <span class="text-muted pull-right">8:03 PM Today</span>
                                </span>
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                              </div>
                            </div>
                            <div class="box-comment">
                              <img class="img-circle img-sm" src="img/Friends/guy-6.jpg" alt="User Image">
                              <div class="comment-text">
                                <span class="username">
                                Nora Havisham
                                <span class="text-muted pull-right">8:03 PM Today</span>
                                </span>
                                The point of using Lorem Ipsum is that it has a more-or-less
                                normal distribution of letters, as opposed to using
                                'Content here, content here', making it look like readable English.
                              </div>
                            </div>
                          </div>
                          <div class="box-footer">
                            <form action="#" method="post">
                              <img class="img-responsive img-circle img-sm" src="img/Friends/guy-3.jpg" alt="Alt Text">
                              <div class="img-push">
                                <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                              </div>
                            </form>
                          </div>
                        </div><!-- end post -->


                        <!--   posts -->
                        <div class="box box-widget">
                          <div class="box-header with-border">
                            <div class="user-block">
                              <img class="img-circle" src="img/Friends/guy-3.jpg" alt="User Image">
                              <span class="username"><a href="#">John Breakgrow jr.</a></span>
                              <span class="description">Shared publicly - 7:30 PM Today</span>
                            </div>
                          </div>

                          <div class="box-body" style="display: block;">
                            <img class="img-responsive pad show-in-modal" src="img/Photos/3.jpg" alt="Photo">
                            <p>I took this photo this morning. What do you guys think?</p>
                            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                            <span class="pull-right text-muted">127 likes - 3 comments</span>
                          </div>
                          <div class="box-footer box-comments" style="display: block;">
                            <div class="box-comment">
                              <img class="img-circle img-sm" src="img/Friends/guy-2.jpg" alt="User Image">
                              <div class="comment-text">
                                <span class="username">
                                Maria Gonzales
                                <span class="text-muted pull-right">8:03 PM Today</span>
                                </span>
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                              </div>
                            </div>

                            <div class="box-comment">
                              <img class="img-circle img-sm" src="img/Friends/guy-3.jpg" alt="User Image">
                              <div class="comment-text">
                                <span class="username">
                                Luna Stark
                                <span class="text-muted pull-right">8:03 PM Today</span>
                                </span>
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                              </div>
                            </div>
                          </div>
                          <div class="box-footer" style="display: block;">
                            <form action="#" method="post">
                              <img class="img-responsive img-circle img-sm" src="img/Friends/guy-3.jpg" alt="Alt Text">
                              <div class="img-push">
                                <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                              </div>
                            </form>
                          </div>
                        </div><!--  end posts -->
                      </div>
                    </div>
                  </div>
                  
                  <div class="tab-pane fade" id="tab-following">
                    <ul class="widget-users row">
                    @foreach ($institute->grades as $grade)
                      <h3>{{$grade->name}}</h3>
                      <hr>
                        @foreach ($grade->subjects as $subject)
                            <h4>{{$subject->name}}</h4>
                            <hr>
                            @foreach ($subject->users as $teacher)
                              <li class="col-md-12">
                                <div class="img">
                                  <img src="img/Friends/woman-3.jpg" alt="">
                                </div>
                                <div class="details">
                                  <div class="name">
                                    <a href="#">{{$teacher->name}}</a>
                                  </div>
                                  <div class="time">
                                    <i class="fa fa-clock-o"></i> Last online: 5 minutes ago
                                  </div>
                                  <div class="type">
                                    <span class="label label-danger">Admin</span>
                                  </div>
                                </div>
                              </li>
                            <hr>
                        @endforeach
                        @endforeach
                    @endforeach
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/woman-3.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Mileth zanders</a>
                          </div>
                          <div class="time">
                            <i class="fa fa-clock-o"></i> Last online: 5 minutes ago
                          </div>
                          <div class="type">
                            <span class="label label-danger">Admin</span>
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/woman-3.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Mila Kendrichk</a>
                          </div>
                          <div class="time online">
                            <i class="fa fa-check-circle"></i> Online
                          </div>
                          <div class="type">
                            <span class="label label-warning">Pending</span>
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/guy-1.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Arnold Thossling</a>
                          </div>
                          <div class="time online">
                            <i class="fa fa-check-circle"></i> Online
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/guy-2.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Peter Downey</a>
                          </div>
                          <div class="time">
                            <i class="fa fa-clock-o"></i> Last online: Thursday
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/woman-3.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Emiliath Suansont</a>
                          </div>
                          <div class="time">
                            <i class="fa fa-clock-o"></i> Last online: 1 week ago
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/guy-6.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Briatng bowingy</a>
                          </div>
                          <div class="time">
                            <i class="fa fa-clock-o"></i> Last online: 1 month ago
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/woman-4.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Milanith Grotyu</a>
                          </div>
                          <div class="time online">
                            <i class="fa fa-check-circle"></i> Online
                          </div>
                          <div class="type">
                            <span class="label label-warning">Pending</span>
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/guy-5.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Trwort Htrew</a>
                          </div>
                          <div class="time online">
                            <i class="fa fa-check-circle"></i> Online
                          </div>
                        </div>
                      </li>
                    </ul>
                    <br>
                    <a href="#" class="btn btn-azure pull-right">
                      <i class="fa fa-refresh"></i>
                      Load more
                    </a>
                  </div>
                  
                  <div class="tab-pane fade" id="tab-followers">
                    <ul class="widget-users row">
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/woman-6.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Danielath grande</a>
                          </div>
                          <div class="time">
                            <i class="fa fa-clock-o"></i> Last online: 5 minutes ago
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/woman-4.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Fernanda Hytrod</a>
                          </div>
                          <div class="time online">
                            <i class="fa fa-check-circle"></i> Online
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/guy-1.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Arnold Thossling</a>
                          </div>
                          <div class="time online">
                            <i class="fa fa-check-circle"></i> Online
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/guy-2.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Peter Downey</a>
                          </div>
                          <div class="time">
                            <i class="fa fa-clock-o"></i> Last online: Thursday
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/woman-3.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Emiliath Suansont</a>
                          </div>
                          <div class="time">
                            <i class="fa fa-clock-o"></i> Last online: 1 week ago
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/guy-6.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Briatng bowingy</a>
                          </div>
                          <div class="time">
                            <i class="fa fa-clock-o"></i> Last online: 1 month ago
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/woman-4.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Milanith Grotyu</a>
                          </div>
                          <div class="time online">
                            <i class="fa fa-check-circle"></i> Online
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/guy-5.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Trwort Htrew</a>
                          </div>
                          <div class="time online">
                            <i class="fa fa-check-circle"></i> Online
                          </div>
                        </div>
                      </li>
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

    <!-- Online users sidebar content-->
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
    </div><!-- Online users sidebar content-->

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