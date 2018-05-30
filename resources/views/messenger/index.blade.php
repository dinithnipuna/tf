@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('style') 
  <link href="{{ asset('/assets/css/messages2.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
      <div class="tile tile-alt" id="messages-main">
	      <div class="ms-menu">
	          <div class="ms-user clearfix">
	              <img src="{{asset('images/users/'. Auth::user()->getAvatar())}}" alt="" class="img-avatar pull-left">
	              <div>Signed in as <br> {{ Auth::user()->name }}</div>
	          </div>
	          
	          <div class="p-15">
	              <div class="dropdown">
	                  <a class="btn btn-azure btn-block" href="#" data-toggle="dropdown">Messages <i class="caret m-l-5"></i></a>

	                  <ul class="dropdown-menu dm-icon w-100">
	                      <li><a href="#"><i class="fa fa-envelope"></i> Messages</a></li>
	                      <li><a href="#"><i class="fa fa-users"></i> Contacts</a></li>
	                      <li><a href="#"><i class="fa fa-format-list-bulleted"> </i>Todo Lists</a></li>
	                  </ul>
	              </div>
	          </div>
	          
	          <div class="list-group lg-alt">
		          	@foreach($threads as $thread)
			             <a class="list-group-item media" href="{{ route('messages.load',$thread->id)}}">
		                  <div class="pull-left">
		                      <img src="{{ asset('images/users/'. $thread->users()->where('user_id','!=',Auth::user()->id)->first()->getAvatar()) }}" alt="" class="img-avatar">
		                  </div>
		                  <div class="media-body">
		                      <div class="list-group-item-heading">{{ $thread->participantsString(Auth::id()) }}</div>
		                      <small class="list-group-item-text c-gray">{{ $thread->latestMessage->body }}</small>
		                  </div>
		              	</a>
		           	@endforeach 
	          </div>    	
	      </div>

	      <div class="ms-body">
	          <div class="action-header clearfix">
	              <div class="visible-xs" id="ms-menu-trigger">
	                  <i class="fa fa-bars"></i>
	              </div>
	              
	              <div class="pull-left hidden-xs">
	                  <img src="{{ asset('images/users/'. $latest_thread->users()->where('user_id','!=',Auth::user()->id)->first()->getAvatar()) }}" alt="" class="img-avatar m-r-10">
	                  <div class="lv-avatar pull-left">
	                      
	                  </div>
	                  <span>{{ $latest_thread->users()->where('user_id','!=',Auth::user()->id)->first()->name }}</span>
	              </div>
	               
	              <ul class="ah-actions actions">
	                  <li>
	                      <a href="#">
	                          <i class="fa fa-trash"></i>
	                      </a>
	                  </li>
	                  <li>
	                      <a href="#">
	                          <i class="fa fa-check"></i>
	                      </a>
	                  </li>
	                  <li>
	                      <a href="#">
	                          <i class="fa fa-clock-o"></i>
	                      </a>
	                  </li>
	                  <li class="dropdown">
	                      <a href="#" data-toggle="dropdown" aria-expanded="true">
	                          <i class="fa fa-sort"></i>
	                      </a>
	          
	                      <ul class="dropdown-menu dropdown-menu-right">
	                          <li>
	                              <a href="#">Latest</a>
	                          </li>
	                          <li>
	                              <a href="#">Oldest</a>
	                          </li>
	                      </ul>
	                  </li>                             
	                  <li class="dropdown">
	                      <a href="#" data-toggle="dropdown" aria-expanded="true">
	                          <i class="fa fa-bars"></i>
	                      </a>
	          
	                      <ul class="dropdown-menu dropdown-menu-right">
	                          <li>
	                              <a href="#">Refresh</a>
	                          </li>
	                          <li>
	                              <a href="#">Message Settings</a>
	                          </li>
	                      </ul>
	                  </li>
	              </ul>
	          </div>
			

				@foreach($latest_thread->messages as $message)
		          <div class="message-feed {{ $message->user->id != Auth::id() ? 'media':'right' }}">
		              <div class="pull-{{ $message->user->id != Auth::id() ? 'left':'right' }}">
		                  <img src="{{ asset('images/users/'. $message->user->getAvatar()) }}" alt="" class="img-avatar">
		              </div>
		              <div class="media-body">
		                  <div class="mf-content">
		                      {{ $message->body }}
		                  </div>
		                  <small class="mf-date"><i class="fa fa-clock-o"></i> {{ $message->created_at->diffForHumans() }}</small>
		              </div>
		          </div>
		        @endforeach
	          <div class="msb-reply">
	          	<form action="{{ route('messages.update', $latest_thread->users()->where('user_id','!=',Auth::user()->id)->first()->id) }}" method="post">
			    	{{ method_field('put') }}
			    	{{ csrf_field() }}
	              	<textarea placeholder="What's on your mind..." name="message"></textarea>
	              	<button type="submit"><i class="fa fa-paper-plane-o"></i></button>
				</form>
	          </div>

	      </div>
      </div>
    </div>
@stop
