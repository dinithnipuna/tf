@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('content')
      <div class="row">
      <h4><i class="fa fa-user m-r-10"></i> Profile</h4>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="/notebooks"><i class="fa fa-user"></i> Profile</a></li>
          <li class="active">Assignments</li>
        </ol>
        <div class="col">
          <div class="widget">
             
              @foreach($classes as $class)
                  <p>{{ $class->name }}</p>
                  
                  <div class="table-responsive">
            <table class="table user-list">
              <thead>
                <tr>
                  <th><span>Title</span></th>
                  <th><span>Class</span></th>
                  <th><span>Created</span></th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
              @foreach($class->assignments as $assignment)
                  <tr>
                  <td>{{ $assignment->title }}</td>
                  <td>{{ $assignment->class->name }}</td>
                  <td>{{ $assignment->created_at }}</td>
                  <td style="width: 20%;">
                    <a href="{{route('assignments.show', $assignment->id)}}" class="table-link success">
                      <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                  </td>
                </tr>
              @endforeach

              </tbody>
            </table>
            </div>
              @endforeach
            </div>
        </div>
      </div>
@endsection