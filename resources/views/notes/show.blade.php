@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('content')

<div class="container page-content">
    <div class="row">
        <h4><i class="fa fa-file m-r-10"></i> Notes</h4>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="{{ route('notebooks.show',$note->notebook->id) }}"><i class="fa fa-file"></i> Notes</a></li>
          <li class="active">{{ $note->title }}</li>
        </ol>
        <h4>{{ $note->title }}</h4>
        
        {!! $note->body !!}

        
    </div>
</div>
@endsection