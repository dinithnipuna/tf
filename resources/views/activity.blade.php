<ul class="list-unstyled team-members">
     @forelse (Auth::user()->notifications()->limit(4)->get() as $notification)
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
              @if($notification->data['post']['postable_type'] == "App\Topic")
              <b><a href="{{ route('profile',['id' => $notification->data['user']['id']]) }}">{{ $notification->data['user']['name']}}</a></b> replied to your forum post 
              
              <b><a href="{{ route('topic.post',['id' => $notification->data['post']['id']]) }}">{{ substr(strip_tags($notification->data['post']['body']),0,50) }}</a> </b> -

              @else
              <b><a href="{{ route('profile',['id' => $notification->data['user']['id']]) }}">{{ $notification->data['user']['name']}}</a></b> commented on your post 
              

              <b><a href="{{ route('posts.show',['id' => $notification->data['post']['id']]) }}">{{ substr(strip_tags($notification->data['post']['body']),0,50) }}</a> </b> -
              @endif

              <span class="timeago" > {{ $notification->created_at->diffForHumans() }}</span>
            </div>

            @elseif($notification->type == "App\Notifications\NewPost")

              <div class="col-xs-9">
              @if($notification->data['post']['postable_type'] == "App\Topic")
              <b><a href="{{ route('profile',['id' => $notification->data['user']['id']]) }}">{{ $notification->data['user']['name']}}</a></b> posted new forum post 
              <b><a href="{{ route('topic.post',['id' => $notification->data['post']['id']]) }}">{{ substr(strip_tags($notification->data['post']['body']),0,50) }}</a></b> -

              @else
              <b><a href="{{ route('profile',['id' => $notification->data['user']['id']]) }}">{{ $notification->data['user']['name']}}</a></b> shared new post 
              <b><a href="{{ route('posts.show',['id' => $notification->data['post']['id']]) }}">{{ substr(strip_tags($notification->data['post']['body']),0,50) }}</a></b> -
              @endif
              <span class="timeago" > {{ $notification->created_at->diffForHumans() }}</span>
            </div>

            @else

            <div class="col-xs-9">
              <b><a href="{{ route('profile',['id' => $notification->data['user']['id']]) }}">{{ $notification->data['user']['name']}}</a></b> add New Assignment 
              <b><a href="{{ route('assignments.show',['id' => $notification->data['assignment']['id']]) }}">{{ $notification->data['assignment']['title'] }}</a></b>  on Class <b><a href="{{ route('classes.show',['id' => $notification->data['class']['id']]) }}">{{ $notification->data['class']['name'] }}</a></b> -
              <span class="timeago" > {{ $notification->created_at->diffForHumans() }}</span>
            </div>

            @endif
          </div>
        </li>
        
    @empty
        <li><a href="#">No Users activity</a></li>
    @endforelse
</ul>         