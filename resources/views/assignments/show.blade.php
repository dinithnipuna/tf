@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('content')
  <div class="row">
        <h4><i class="fa fa-file m-r-10"></i> Assignments</h4>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
          @if(Auth::user()->hasRole(['student']))
            <li><a href="/profile/assignments"><i class="fa fa-file"></i> Assignments</a></li>
          @else
            <li><a href="/assignments"><i class="fa fa-file"></i> Assignments</a></li>
          @endif
          <li class="active">{{ $assignment->title }}</li>
        </ol>
        <h4>{{ $assignment->title }}</h4>
        
        {!! $assignment->body !!}   
  </div>
@endsection