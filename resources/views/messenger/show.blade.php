@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('style') 
      <link href="{{ asset('/assets/css/messages2.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="col-md-6">
        <h1>{{ $thread->subject }}</h1>
        @each('messenger.partials.messages', $thread->messages, 'message')

        @include('messenger.partials.form-message')
    </div>
@stop
