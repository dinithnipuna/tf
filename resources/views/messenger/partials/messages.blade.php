<div class="media">
    <a class="pull-left" href="#">
        @if($message->user->avatar != null)
            <img src="{{asset('images/users/'. $message->user->avatar)}}" alt="" class="img-avatar">
          @else
            <img src="{{ asset('images/users/default.png')}}" alt="" class="img-avatar">
          @endif  
    </a>
    <div class="media-body">
        <h5 class="media-heading">{{ $message->user->name }}</h5>
        <p>{{ $message->body }}</p>
        <div class="text-muted">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>