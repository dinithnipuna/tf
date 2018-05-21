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
            @if (Auth::user()->hasRole(['admin', 'manager', 'teacher']))
                <li><a href="/admin">Admin</a></li>
            @endif
                <li class="actives"><a href="{{ route('profile',['id' => Auth::user()->id]) }}">Profile</a></li>
            <li><a href="/">Home</a></li>
             <li class="dropdown" id="markasread" onclick="markNotificationAsRead({{ Auth::user()->unreadNotifications()->count()}})">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-globe"></i> <span class="label label-danger">{{ Auth::user()->unreadNotifications()->count()}}</span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @forelse (Auth::user()->unreadNotifications as $notification)
                                    <li><a href="{{ route('posts.show',$notification->data['post']['id']) }}">{{ $notification->data['user']['name']}} commented on your post <strong>{{ substr(strip_tags($notification->data['post']['body']),0,50) }}</strong></a></li>
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                {{-- @if (Auth::user()->hasRole('manager'))
                                    @foreach (Auth::user()->institutes as $institute)
                                         <li><a href="{{ route('institutes.show',['id' => $institute->id]) }}"><i class="fa fa-btn fa-sign-out"></i>{{$institute->name}}</a></li>
                                    @endforeach
                                @endif --}}
                                <li><a href="{{ route('profile.edit') }}"><i class="fa fa-btn fa-pencil"></i> Update Profile</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </li>
                    @endif
          </ul>

        <form class="navbar-form navbar-right" id="navBarSearchForm">
        <div class="form-group">
            <input class="form-control input-lg" placeholder="Search..." type="text" name="country" id="autocomplete">
            </div>
        </form>
          
        </div>
      </div>
    </nav>