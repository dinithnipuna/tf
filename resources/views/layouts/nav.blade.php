<!-- Fixed navbar -->
    <nav class="navbar navbar-white navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><b>Teacher Finder</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

          <ul class="nav navbar-nav navbar-right">
           <?php $names = explode(" ", Auth::user()->name); ?>
                <li class="actives user user-menu"><a href="{{ route('profile',['id' => Auth::user()->id]) }}"><img src="{{ asset('images/users/'. Auth::user()->getAvatar()) }}" class="user-image"> {{ $names[0] }}</a></li>
            <li><a href="/">Home</a></li>
            <li><a href="/messages"><i class="fa fa-envelope fa-lg"></i>  @include('messenger.unread-count')</a></li>
             <li class="dropdown" id="markasread" onclick="markNotificationAsRead({{ Auth::user()->unreadNotifications()->count()}})">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-globe fa-lg"></i> 
                                @if(Auth::user()->unreadNotifications()->count() > 0)
                                <span class="label label-danger">{{ Auth::user()->unreadNotifications()->count()}}</span>
                                @endif
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @forelse (Auth::user()->unreadNotifications as $notification)
                                    @if($notification->type == "App\Notifications\RepliedToPost")
                                    <li><a href="{{ route('posts.show',$notification->data['post']['id']) }}">{{ $notification->data['user']['name']}} commented on your post <strong>{{ substr(strip_tags($notification->data['post']['body']),0,50) }}</strong></a></li>
                                    @elseif($notification->type == "App\Notifications\NewPost")
                                    <li><a href="{{ route('posts.show',$notification->data['post']['id']) }}">{{ $notification->data['user']['name']}} shared new post <strong>{{ substr(strip_tags($notification->data['post']['body']),0,50) }}</strong></a></li>
                                    @else
                                    <li><a href="{{ route('posts.show',$notification->data['assignment']['id']) }}">{{ $notification->data['user']['name']}} add New Assignment <strong>{{ $notification->data['assignment']['title'] }} on Class {{ $notification->data['class']['name'] }}</strong></a></li>
                                    @endif
                                @empty
                                    <li><a href="#">No unread Notifications</a></li>
                                @endforelse
                            </ul>
                        </li>
            <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-btn fa-sort-down fa-lg"></i>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                {{-- @if (Auth::user()->hasRole('manager'))
                                    @foreach (Auth::user()->institutes as $institute)
                                         <li><a href="{{ route('institutes.show',['id' => $institute->id]) }}"><i class="fa fa-btn fa-sign-out"></i>{{$institute->name}}</a></li>
                                    @endforeach
                                @endif --}}
                                @if (Auth::user()->hasRole(['admin', 'manager', 'teacher']))
                                    <li><a href="/admin"><i class="fa fa-btn fa-gear"></i> Admin Panel</a></li>
                                @endif
                                <li><a href="{{ route('profile.edit') }}"><i class="fa fa-btn fa-pencil"></i> Update Profile</a></li>
                                <li><a href="{{url('password/change')}}"><i class="fa fa-btn fa-key"></i> Change Password</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </li>
                    @endif
          </ul>

        <form class="navbar-form navbar-right" id="navBarSearchForm">
        <div class="form-group">
            <input class="form-control input-lg" placeholder="Search Institute or Teacher..." type="text" name="country" id="autocomplete">
            </div>
        </form>
          
        </div>
      </div>
    </nav>